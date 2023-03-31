<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $this->createRoles();
        $this->createAbilities();
        
        Bouncer::allow('admin')->everything();  // allow the role 'admin' to have access to everything
    }
    /**
    *  Crear Roles.
    */
    protected function createRoles()
    {
        Bouncer::role()->create([
            'name' => 'admin',
            'title' => 'Administrador',
        ]);

        Bouncer::role()->create([
          'name' => 'user',
          'title' => 'Usuario',
        ]);
    }

    /**
     * Crear Habilidades.
     */
    protected function createAbilities()
    {
      Bouncer::ability()->create([
        'name' => '*',
        'title' => 'All Abilities',
        'entity_type' => '*',
      ]);
    }
}
