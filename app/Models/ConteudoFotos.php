<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConteudoFotos extends Model
{
    protected $table = 'conteudo_fotos';
    protected $fillable = [
        'id_coteudo',
        'id_media',
    ];
}
