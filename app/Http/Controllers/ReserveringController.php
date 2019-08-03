<?php

namespace App\Http\Controllers;

use App\Reservering;

class ReserveringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Alle reserveringen worden opgehaald.
        $reserveringen = Reservering::all();

        return view('reservering')->with(compact('reserveringen'));
    }
}
