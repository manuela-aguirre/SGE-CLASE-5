<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
   $ingenieria = Genero::where('nombre', 'Ingenieria de Sistemas')->first();
$agropecuaria = Genero::where('nombre', 'Agropecuaria')->first();
$administracion = Genero::where('nombre', 'Administracion de Empresas')->first();
$contabilidad = Genero::where('nombre', 'Contabilidad')->first();
$diseno = Genero::where('nombre', 'Diseno e Integracion Multimedia')->first();
}
