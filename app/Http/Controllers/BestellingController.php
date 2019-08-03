<?php

namespace App\Http\Controllers;

use App\Bestelling;
use App\Product;
use Illuminate\Support\Facades\DB;

class BestellingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // In bestellingen worden alle bestellingen met het archief waarde 0 opgehaald.
        $bestellingen = DB::table('bestellings')
            ->where('archief', '=', 0)
            ->get();

        return view('bestelling')->with(compact('bestellingen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $tafel
     * @return \Illuminate\Http\Response
     */
    public function create($tafel)
    {
        // Alle producten worden opgehaald.
        $producten = Product::all();

        return view('bestelling.create')->with(compact('producten', 'tafel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Bestelling $bestelling
     * @return \Illuminate\Http\Response
     */
    public function store(Bestelling $bestelling)
    {
        // Elk product wordt gecontroleerd of er een waarde in staat.
        request()->validate([
            'aantal_*' => 'required',
            'naam_*' => 'required',
            'prijs_*' => 'required',
            'tafel' => 'required'
        ]);

        // Elk product wordt geloopt en gecheckt of het aantal van een product groter is dan 0. Zo ja, dan wordt een bestelling aangemaakt.
        for ($i = 1; $i < 5; $i++) {
            if (request('aantal_' . $i) > 0) {
                $prijs = request('aantal_' . $i) * request('prijs_' . $i);
                $bestelling->create([
                    'naam' => request('naam_' . $i),
                    'prijs' => $prijs,
                    'productAantal' => request('aantal_' . $i),
                    'tafel_id' => request('tafel'),
                    'archief' => false
                ]);
            }
        }

        return redirect('/bestellingen')->with('success', 'Bestelling aangemaakt');
    }
}
