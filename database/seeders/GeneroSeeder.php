<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    public function run(): void
    {
        Genero::create(['nombre' => 'Ingenieria de Sistemas']);
        Genero::create(['nombre' => 'Agropecuaria']);
        Genero::create(['nombre' => 'Administracion de Empresas']);
        Genero::create(['nombre' => 'Contabilidad']);
        Genero::create(['nombre' => 'Diseno e Integracion Multimedia']);
    }
}
