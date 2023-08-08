<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams_users')->insert([
            [
                'user_id' => 2,
                'team_id' => 1,
            ],
            [
                'user_id' => 4,
                'team_id' => 1,
            ],
            [
                'user_id' => 5,
                'team_id' => 1,
            ],
            [
                'user_id' => 3,
                'team_id' => 2,
            ],
            [
                'user_id' => 4,
                'team_id' => 2,
            ],
            [
                'user_id' => 5,
                'team_id' => 2,
            ],
            [
                'user_id' => 2,
                'team_id' => 3,
            ],
            [
                'user_id' => 4,
                'team_id' => 3,
            ],
        ]);
    }
}
