<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriasController extends Controller
{
      public function index(){
        $categorias = Categorias::paginate(5);
        return view('admin.categorias.index',compact('categorias'));
    }

    public function create(){
        $categorias = Categorias::whereNull('categoria_pai')->get();
        return view('admin.categorias.create',compact('categorias'));
    }
    public function store(Request $request){
        $data = $request->except('_token');
        

        $categoria = Categorias::create($data);
        $categoria->slug = Str::slug($categoria->nome . '-'. $categoria->id);
        $categoria->save();
        return response()->json(['status'=>'ok']);
    }
}