<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $representations = [];
        $reservations = Reservation::with(['user', 'representations.show'])->where('user_id', '=', $userId)->get();

        foreach($reservations as $reservation){
            $representations = $reservation->representations;
        }

        return view('reservation.index', [
            'representations' => $representations,
        ]);
    }

    public function post(Request $request)
    {
        dd($request);
    }
}
