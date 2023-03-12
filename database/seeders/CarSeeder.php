<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->updateOrInsert([
            'name' => 'Skoda',
            'registration_number' => 'AA963AA',
            'is_registered' => 1,
        ],[
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cars')->updateOrInsert([
            'name' => 'Opel',
            'registration_number' => null,
            'is_registered' => 0,
        ],[
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cars')->updateOrInsert([
            'name' => 'BMW',
            'registration_number' => 'BB111AA',
            'is_registered' => 1,
        ],[
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cars')->updateOrInsert([
            'name' => 'Mercedes',
            'registration_number' => null,
            'is_registered' => 0,
        ],[
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
