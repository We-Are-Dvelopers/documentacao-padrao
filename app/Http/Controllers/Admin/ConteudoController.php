<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CategoriasController;

class ConteudoController extends Controller
{
    public function index(){
        return view('admin.conteudo.index');
    }

    public function create(){
        $categoria = Categorias::all();
        return view(('admin.conteudo.create'));
    }

    public function store(Request $request){
        $data = $request->except('_token');


        $conteudo = Conteudos::create($data);
        $conteudo->slug = Str::slug($conteudo->nome . '-' . $conteudo->id);
        $conteudo->save();
        return response()->json(['status'=>'ok']);
    }
}
