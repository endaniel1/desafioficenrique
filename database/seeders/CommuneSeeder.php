<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commune;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commune::create(['name' => 'Las Condes
        ', 'description' => '']);
        
        Commune::create(['name' => 'Puente Alto
        ', 'description' => '']);
        
        Commune::create(['name' => 'La Florida
        ', 'description' => '']);
    }
}
