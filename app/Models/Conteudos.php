<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conteudos extends Model
{
    protected $table = 'conteudos';
    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'id_media',
        'id_categoria',
        'status',
    ];
}
