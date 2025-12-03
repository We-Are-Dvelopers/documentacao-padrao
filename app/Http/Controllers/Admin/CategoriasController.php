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

    public function edit($id)
    {
        $categoria = Categorias::findOrFail($id);

        // Para preenchimento do select de categoria pai
        $categorias = Categorias::whereNull('categoria_pai')
                        ->where('id', '!=', $id) // impede ser pai de si mesma
                        ->get();

        return view('admin.categorias.edit', compact('categoria', 'categorias'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);

        $categoria = Categorias::findOrFail($id);
        $categoria->update($data);

        // Atualiza o slug caso o nome tenha sido alterado
        $categoria->slug = Str::slug($categoria->nome . '-' . $categoria->id);
        $categoria->save();

        return response()->json(['status' => 'ok']);
    }
    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        $categoria->delete();

        return response()->json(['status' => 'ok']);
    }
}