<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create(['name' => 'Pastelería
        ', 'description' => '']);
        
        Item::create(['name' => 'Minimarket
        ', 'description' => '']);
        
        Item::create(['name' => 'Electrónica
        ', 'description' => '']);
    }
}