```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Editorial;
use App\Models\Genero;

class LibroSeeder extends Seeder
{
    public function run(): void
    {
        $pearson = Editorial::where('nombre', 'Pearson')->first();
        $mcgrawHill = Editorial::where('nombre', 'McGraw-Hill')->first();
        $alfaomega = Editorial::where('nombre', 'Alfaomega')->first();
        $planeta = Editorial::where('nombre', 'Planeta')->first();
        $trillas = Editorial::where('nombre', 'Editorial Trillas')->first();

        $ingenieria = Genero::where('nombre', 'Ingenieria de Sistemas')->first();
        $agropecuaria = Genero::where('nombre', 'Agropecuaria')->first();
        $administracion = Genero::where('nombre', 'Administracion de Empresas')->first();
        $contabilidad = Genero::where('nombre', 'Contabilidad')->first();
        $diseno = Genero::where('nombre', 'Diseno e Integracion Multimedia')->first();

        Libro::create([
            'titulo' => 'Fundamentos de la ingeniería de software',
            'descripcion' => 'Perspectiva para los ingenieros en sistemas del TecNM',
            'stock' => 5,
            'isbn' => '9780134757599',
            'editorial_id' => $pearson->id,
            'genero_id' => $ingenieria->id,
        ]);

        Libro::create([
            'titulo' => 'Estructuras de datos y algoritmos',
            'descripcion' => 'Introducción a estructuras de datos en Java',
            'stock' => 3,
            'isbn' => '9780133845611',
            'editorial_id' => $mcgrawHill->id,
            'genero_id' => $ingenieria->id,
        ]);

        Libro::create([
            'titulo' => 'Bases de datos: diseño y gestión',
            'descripcion' => 'Fundamentos de modelado relacional',
            'stock' => 4,
            'isbn' => '9786077076590',
            'editorial_id' => $alfaomega->id,
            'genero_id' => $ingenieria->id,
        ]);

        Libro::create([
            'titulo' => 'Cien años de soledad',
            'descripcion' => 'Novela de Gabriel García Márquez',
            'stock' => 2,
            'isbn' => '9780307474728',
            'editorial_id' => $planeta->id,
            'genero_id' => $diseno->id,
        ]);

        Libro::create([
            'titulo' => 'Redes de computadoras',
            'descripcion' => 'Principios y práctica de redes',
            'stock' => 6,
            'isbn' => '9786071706439',
            'editorial_id' => $trillas->id,
            'genero_id' => $ingenieria->id,
        ]);
    }
}
```
