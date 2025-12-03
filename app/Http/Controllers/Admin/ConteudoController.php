<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conteudos;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConteudoController extends Controller
{
    public function index(){
        $conteudos = Conteudos::paginate(5);
        return view('admin.conteudo.index', compact('conteudos'));
    }

    public function create()
    {
        // Apenas categorias "pai" ativas
        $categorias = Categorias::whereNull('categoria_pai')
                                ->where('status', 'ativo')
                                ->get();

        return view('admin.conteudo.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nome);

        Conteudos::create($data);

        return response()->json(['status' => 'ok']);
    }


    public function edit($id)
    {
        $conteudo = Conteudos::findOrFail($id);

        $categorias = Categorias::whereNull('categoria_pai')
                                ->where('id', '!=', $conteudo->categoria_id)
                                ->get();

        return view('admin.conteudo.edit', compact('conteudo', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token','_method']);

        $conteudo = Conteudos::findOrFail($id);
        $conteudo->update($data);
        // atualiza slug
        $conteudo->slug = Str::slug($conteudo->nome . '-' . $conteudo->id);
        $conteudo->save();

        return response()->json(['status' => 'ok']);
    }

    public function destroy($id)
    {
        $conteudo = Conteudos::findOrFail($id);
        $conteudo->delete();

        return response()->json(['status' => 'ok']);
    }
}
