<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConteudoController extends Controller
{
    public function index(){
        return view('admin.conteudo.index');
    }

    public function create(){
        return view(('admin.conteudo.create'));
    }
}
