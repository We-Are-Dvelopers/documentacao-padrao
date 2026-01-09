<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categorias;
use App\Models\Conteudos;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = Categorias::where('status', 1)->get();
        $conteudos = Conteudos::where('status', 1)->get();

        return view('site.home', compact('categorias', 'conteudos'));
    }
}