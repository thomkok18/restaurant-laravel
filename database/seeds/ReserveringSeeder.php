<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReserveringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reserverings')->insert([
            'voornaam' => 'Thom',
            'tussenvoegsels' => '',
            'achternaam' => 'Kok',
            'tafel_id' => 1,
            'datum' => '2018-12-10',
            'tijd' => '18:10:00',
            'aantalPersonen' => 2,
            'ingecheckt' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('reserverings')->insert([
            'voornaam' => 'Barry',
            'tussenvoegsels' => '',
            'achternaam' => 'Willems',
            'tafel_id' => 2,
            'datum' => '2018-12-10',
            'tijd' => '19:30:00',
            'aantalPersonen' => 3,
            'ingecheckt' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('reserverings')->insert([
            'voornaam' => 'Dilion',
            'tussenvoegsels' => '',
            'achternaam' => 'Martha',
            'tafel_id' => 3,
            'datum' => '2018-12-10',
            'tijd' => '17:25:00',
            'aantalPersonen' => 5,
            'ingecheckt' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
