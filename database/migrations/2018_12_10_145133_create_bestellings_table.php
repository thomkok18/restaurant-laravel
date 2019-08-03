<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBestellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestellings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tafel_id');
            $table->string('naam');
            $table->double('prijs');
            $table->integer('productAantal');
            $table->boolean('archief');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bestellings');
    }
}
