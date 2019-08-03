<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Er wordt gecontroleerd of de variabele bedrag niet leeg is.
        request()->validate([
            'bedrag' => 'required',
        ]);

        // De prijs van het product wordt hier aangepast.
        DB::table('products')
            ->where('id', $id)
            ->update(['prijs' => request('bedrag')]);

        return redirect('/bestelling/' . $id)->with('success', 'Prijs aangepast');
    }
}
