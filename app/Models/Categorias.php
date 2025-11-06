<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'id_media',
        'categoria_pai',
        'status',
    ];
}
