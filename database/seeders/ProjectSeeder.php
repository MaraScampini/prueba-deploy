<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'name' => 'Construcción Edificio A',
                'place' => 'Ciudad 1',
                'start_date' => '2023-08-01',
                'end_date' => '2024-03-31',
                'team' => 4,
                'description' => 'Proyecto de construcción de un edificio residencial de 15 pisos.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Remodelación Plaza Central',
                'place' => 'Ciudad 2',
                'start_date' => '2023-09-15',
                'end_date' => '2023-12-31',
                'team' => 2,
                'description' => 'Proyecto de remodelación de la plaza principal de la ciudad.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Construcción de Autopista',
                'place' => 'Ciudad 3',
                'start_date' => '2023-10-01',
                'end_date' => '2024-06-30',
                'team' => 1,
                'description' => 'Proyecto de construcción de una nueva autopista que conectará dos ciudades.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Construcción de Puente Peatonal',
                'place' => 'Ciudad 4',
                'start_date' => '2023-11-10',
                'end_date' => '2024-01-31',
                'team' => 3,
                'description' => 'Proyecto de construcción de un puente peatonal sobre un río.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Construcción de Parque Acuático',
                'place' => 'Ciudad 5',
                'start_date' => '2024-01-01',
                'end_date' => '2024-12-31',
                'team' => 2,
                'description' => 'Proyecto de construcción de un parque acuático con toboganes y piscinas.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Construcción de Centro Comercial',
                'place' => 'Ciudad 6',
                'start_date' => '2024-02-15',
                'end_date' => '2024-09-30',
                'team' => 3,
                'description' => 'Proyecto de construcción de un centro comercial con múltiples tiendas y restaurantes.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
