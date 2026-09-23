<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'portada_url',
        'stock',
        'isbn',
        'editorial_id',
        'genero_id',
    ];

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}