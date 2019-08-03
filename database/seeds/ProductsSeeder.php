<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'naam' => 'Lazagne',
            'prijs' => '5.45',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'naam' => 'Macaroni',
            'prijs' => '2.85',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert([
            'id' => 3,
            'naam' => 'Zalmfilet',
            'prijs' => '6.99',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert([
            'id' => 4,
            'naam' => 'Tosi ',
            'prijs' => '3.60',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
