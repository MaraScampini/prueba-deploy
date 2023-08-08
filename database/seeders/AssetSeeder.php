<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assets')->insert([
            [
                'name' => 'Excavadora 1',
                'description' => 'Excavadora de orugas para trabajos de excavación en construcciones.',
                'type' => 'Excavadora',
                'image' => 'excavadora1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Excavadora 2',
                'description' => 'Excavadora de orugas para trabajos de excavación en construcciones.',
                'type' => 'Excavadora',
                'image' => 'excavadora2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Excavadora 3',
                'description' => 'Excavadora de orugas para trabajos de excavación en construcciones.',
                'type' => 'Excavadora',
                'image' => 'excavadora3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grúa Torre',
                'description' => 'Grúa torre para levantar y trasladar materiales pesados en obras de construcción.',
                'type' => 'Grúa',
                'image' => 'grua_torre.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Retroexcavadora',
                'description' => 'Retroexcavadora para trabajos de excavación y movimiento de tierra.',
                'type' => 'Retroexcavadora',
                'image' => 'retroexcavadora.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mini Retroexcavadora',
                'description' => 'Retroexcavadora para trabajos de excavación y movimiento de tierra.',
                'type' => 'Retroexcavadora',
                'image' => 'miniRetroexcavadora.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Camión Volquete',
                'description' => 'Camión volquete para transporte de materiales en obras de construcción.',
                'type' => 'Camión',
                'image' => 'camion_volquete.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rodillo Compactador',
                'description' => 'Rodillo compactador para compactar y nivelar terrenos en construcciones.',
                'type' => 'Rodillo',
                'image' => 'rodillo_compactador.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
