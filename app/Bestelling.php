<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    protected $fillable = ['naam', 'prijs', 'productAantal', 'tafel_id', 'archief'];
}
