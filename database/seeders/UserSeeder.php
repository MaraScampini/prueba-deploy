<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'surname' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('Password1'),
                'role_id' => 1,
                'dni' => '2656789T',
                'birthdate' => '1994-09-12',
                'phone_number' => 111111111,
                'employee_number' => 000,
                'gender' => 'female',
                'category' => 'CTO'
            ],

            [
                'name' => 'Lead1',
                'surname' => 'Lead1',
                'email' => 'lead1@example.com',
                'password' => Hash::make('Password1'),
                'role_id' => 2,
                'dni' => '2656444Y',
                'birthdate' => '1991-05-02',
                'phone_number' => 22222222,
                'employee_number' => 001,
                'gender' => 'male',
                'category' => 'Engineer'
            ],

            [
                'name' => 'Lead2',
                'surname' => 'Lead2',
                'email' => 'lead2@example.com',
                'password' => Hash::make('Password1'),
                'role_id' => 2,
                'dni' => '2658844P',
                'birthdate' => '1990-08-17',
                'phone_number' => 21345678,
                'employee_number' => 002,
                'gender' => 'female',
                'category' => 'Engineer'
            ],

            [
                'name' => 'User1',
                'surname' => 'User1',
                'email' => 'user1@example.com',
                'password' => Hash::make('Password1'),
                'role_id' => 3,
                'dni' => '2777444Y',
                'birthdate' => '1980-06-01',
                'phone_number' => 23333333,
                'employee_number' => 003,
                'gender' => 'female',
                'category' => 'Architect'
            ],

            [
                'name' => 'User2',
                'surname' => 'User2',
                'email' => 'user2@example.com',
                'password' => Hash::make('Password1'),
                'role_id' => 3,
                'dni' => '876567B',
                'birthdate' => '1995-04-05',
                'phone_number' => 2534356564,
                'employee_number' => 004,
                'gender' => 'male',
                'category' => 'Architect'
            ],

            [
                'name' => 'User3',
                'surname' => 'User3',
                'email' => 'user3@example.com',
                'password' => Hash::make('Password1'),
                'role_id' => 3,
                'dni' => '987689L',
                'birthdate' => '1987-11-29',
                'phone_number' => 9785645,
                'employee_number' => 005,
                'gender' => 'female',
                'category' => 'Engineer'
            ],
        ]);
    }
}
