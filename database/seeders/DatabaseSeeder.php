<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleSeeder::class
        ]);

        $this->call([
            UserSeeder::class
        ]);

        $this->call([
            AssetSeeder::class
        ]);

        $this->call([
            BookingSeeder::class
        ]);

        $this->call([
            TeamSeeder::class
        ]);

        $this->call([
            TeamsUserSeeder::class
        ]);

        $this->call([
            ProjectSeeder::class
        ]);

        $this->call([
            ProviderSeeder::class
        ]);

        $this->call([
            InventoryProjectSeeder::class
        ]);

        $this->call([
            InventorySeeder::class
        ]);

        $this->call([
            ProductSeeder::class
        ]);

        $this->call([
            ProductsProviderSeeder::class
        ]);
    }
}
