<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Editorial;

class EditorialSeeder extends Seeder
{
    public function run(): void
    {
        Editorial::create(['nombre' => 'Pearson']);
        Editorial::create(['nombre' => 'McGraw-Hill']);
        Editorial::create(['nombre' => 'Alfaomega']);
        Editorial::create(['nombre' => 'Planeta']);
        Editorial::create(['nombre' => 'Editorial Trillas']);
    }
}
