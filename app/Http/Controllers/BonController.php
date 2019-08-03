<?php

namespace App\Http\Controllers;

use App\Bon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Alle bonnen worden opgehaald.
        $bonnen = Bon::all();

        return view('bon')->with(compact('bonnen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Er wordt gecontroleerd of er een tafel is en er een waarde in aanmaakdatum is.
        request()->validate([
            'tafel' => 'required',
            'created' => 'required'
        ]);

        // Uit de prijs komt een totale waarde van alle bedragen bij elkaar op basis van het id van een tafel.
        $prijs = DB::table('bestellings')
            ->select(DB::raw('SUM(prijs) as totale_prijs'))
            ->where('tafel_id', '=', request('tafel'))
            ->get();

        // De bon wordt hier aangemaakt en de totale prijs wordt hierin meegenomen.
        DB::table('bons')->insert([
            'tafel_id' => request('tafel'),
            'betaald' => number_format($prijs[0]->totale_prijs, 2),
            'datum' => now(),
            'tijd' => now(),
            'created_at' => request('created'),
            'updated_at' => request('created')
        ]);

        // De bestelling wordt hier in het archief gezet, zodat het niet meer zichtbaar is tussen de bestellingen.
        DB::table('bestellings')
            ->where('tafel_id', '=', request('tafel'))
            ->update(['archief' => true]);

        return redirect('/bon')->with('success', 'Bonnetje aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // De specifieke bon wordt opgehaald.
        $bon = Bon::find($id);

        // In created_at komt de datum en tijd van de bon.
        $created_at = $bon->created_at->format('Y-m-d H:i:s');

        // De datum en tijd van de bon wordt opgezocht in bestellingen en opgehaald.
        $bestellingen = DB::table('bestellings')
            ->where('created_at', '=', $created_at)
            ->get();

        // De totale prijs van de bestelling wordt opgehaald op basis van de datum en tijd wanneer het is aangemaakt.
        $totalePrijs = DB::table('bestellings')
            ->select(DB::raw('SUM(prijs) as totale_prijs'))
            ->where('created_at', '=', $created_at)
            ->get();

        // De totale prijs wordt opgeslagen in de variabele totaal.
        $totaal = $totalePrijs[0]->totale_prijs;

        return view('bonnetje', compact('bon', 'bestellingen', 'totaal'));
    }
}
