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
        $categorias = Categorias::where('status', 'ativo')->get();
        return view('admin.conteudo.create', compact('categorias'));
        
    }

    public function store(Request $request)
    {
        return view('admin.conteudo.create', compact('id_categoria'));    
    }
}