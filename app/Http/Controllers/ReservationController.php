<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\RepresentationReservation;
use App\Models\Reservation;
use DateTime;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $representationReservations = RepresentationReservation::with([
            'representation.show',
            'representation.location'
        ])->whereHas('reservation', function ($query) use ($request){
            $query->where('user_id', $request->user()->id);
        })->get();
        //dd($representationReservations);

        return view('reservation.index', [
            'representationReservations' => $representationReservations,
        ]);
    }

    public function post(StoreReservationRequest $request)
    {

        $reservation = new Reservation();
        $reservation->user_id = $request->user()->id;
        $reservation->booking_date = new DateTime('now');
        $reservation->status = 'draft';

        $reservation->save();
        //dd($request);
        $reservation->representationReservations()->create([
            'representation_id' => $request->representation_id,
            'price_id' => $request->price_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('reservations.index');
    }
}
