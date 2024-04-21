<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use App\Models\Price;
use App\Models\Representation;
use App\Models\Show;

class StripeController extends Controller
{
    public function index()
    {

        return view('stripe.cancel');
    }

    public function checkout(StoreReservationRequest $request)
    {
        $price = Price::find($request->input('price_id'));

        $representation = Representation::find($request->input('representation_id'));

        $show = Show::find($representation->show_id);

        $request->session()->put('reservation_data', [
            'representation_id' => $request->input('representation_id'),
            'price_id' => $request->input('price_id'),
            'quantity' => $request->input('quantity'),
            'price' => $price->price,
        ]);

        //configuration de la clé secrète
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $show->title,
                        ],
                        'unit_amount' => str_replace('.', '', $price->price)
                    ],
                    'quantity' => $request->quantity,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.index')
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('stripe.index');
    }
}
