<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Conteudos;
use Illuminate\Support\Str;
use App\Models\Categorias;



class ConteudoController extends Controller
{
    public function index(){
        return view('admin.conteudo.index');
    }

    public function create(){
        $conteudos = Conteudos::all();
        return view('admin.conteudo.create', compact('conteudos'));
        
    }

    public function store(Request $request)
    {
        $categorias = Categorias::all();
        return view('admin.conteudo.create', compact('id_categoria'));    
    }
}