<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'portada_url', 'stock', 'isbn', 'editorial_id',
    ];

    // Relación: Libro pertenece a una Editorial
    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }
}
