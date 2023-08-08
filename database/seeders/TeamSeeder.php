<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            [
            'name' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'name' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ],
        ]);
    }
}
