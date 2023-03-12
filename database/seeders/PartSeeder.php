<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->updateOrInsert([
            'name' => 'Turbo',
            'serial_number' => 'T00000',
            'car_id' => 1,
        ],[
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('parts')->updateOrInsert([
            'name' => 'Filter',
            'serial_number' => 'F22224',
            'car_id' => 1,
        ],[
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('parts')->updateOrInsert([
            'name' => 'Egr',
            'serial_number' => 'E11111',
            'car_id' => 2,
        ],[
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('parts')->updateOrInsert([
            'name' => 'Exhaust',
            'serial_number' => 'E00054',
            'car_id' => 3,
        ],[
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
