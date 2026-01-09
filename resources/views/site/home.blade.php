@extends('layouts.app-admin')

@section('content')
<div class="container">

    <h1>Home</h1>

    {{-- CATEGORIAS --}}
    <section>
        <h2>Categorias</h2>

        <div class="row">
            @foreach($categorias as $categoria)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $categoria->nome }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CONTEÚDOS --}}
    <section class="mt-5">
        <h2>Conteúdos</h2>

        <div class="row">
            @foreach($conteudos as $conteudo)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $conteudo->nome }}</h5>
                            <p>{{ $conteudo->descricao }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>
@endsection