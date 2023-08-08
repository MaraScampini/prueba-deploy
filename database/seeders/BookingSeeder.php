<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'user_id' => 2,
                'asset_id' => 1,
                'status' => 'reserved',
                'start_date' => '2023-09-02',
                'end_date' => '2023-09-12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'asset_id' => 4,
                'status' => 'reserved',
                'start_date' => '2023-10-04',
                'end_date' => '2023-10-10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'asset_id' => 4,
                'status' => 'maintenance',
                'start_date' => '2023-09-15',
                'end_date' => '2023-09-28',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'asset_id' => 2,
                'status' => 'maintenance',
                'start_date' => '2023-11-01',
                'end_date' => '2023-11-28',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'asset_id' => 2,
                'status' => 'reserved',
                'start_date' => '2023-08-15',
                'end_date' => '2023-08-19',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'asset_id' => 5,
                'status' => 'reserved',
                'start_date' => '2023-10-02',
                'end_date' => '2023-10-12',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}