<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('providers')->insert([
            [
                'contact_name' => 'prov1',
                'company' => 'provider1',
                'location' => 'valencia',
                'discount' => 0.50,
                'phone_number' => 123456789,
                'email' => 'provider1@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'contact_name' => 'prov2',
                'company' => 'provider2',
                'location' => 'valencia',
                'discount' => 0.30,
                'phone_number' => 324323454,
                'email' => 'provider2@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'contact_name' => 'prov3',
                'company' => 'provider3',
                'location' => 'Mislata',
                'discount' => 0.1,
                'phone_number' => 654654654,
                'email' => 'provider3@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'contact_name' => 'prov4',
                'company' => 'provider4',
                'location' => 'Paterna',
                'discount' => 0.150,
                'phone_number' => 98798765,
                'email' => 'provider4@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}