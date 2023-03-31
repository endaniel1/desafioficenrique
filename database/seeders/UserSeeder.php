<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {    
        $admin = User::factory()->create([
          'name' => 'Enrique Rodriguez',
          'email' => 'enriq_1997@hotmail.com',
          'email_verified_at' => now(),
          'password' => bcrypt('123456')
        ]);
    
        $admin->assign('admin');

        $admin = User::factory()->create([
          'name' => 'Sergio',
          'email' => 'tudela.sergio@gmail.com',
          'email_verified_at' => now(),
          'password' => bcrypt('123456')
        ]);
    
        $admin->assign('admin');
    }
}
