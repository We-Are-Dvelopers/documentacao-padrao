@extends('layouts.app-admin')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h4>Criar Conteúdo</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
 
        <div class="row align-items-center">
            <div class="col-6">
                <div class="">
                    <label for="">Nome</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-3">
                <label for="">Categoria</label>
                <select name="" class="form-select" id="">
                    <option value="">Selecione</option>
                    <option value="">Categoira 1</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Status</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="radioDefault1" value="ativo">
                        <label class="form-check-label" for="radioDefault1">
                            Ativo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="radioDefault2" value="inativo">
                        <label class="form-check-label" for="radioDefault2">
                            inativo
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
            <label for="">Descrição</label>
            <textarea name="" id="" class="editor"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="mb-3">
                        <label for="formFile" class="form-label">Localizar arquivos</label>
                        <input class="form-control" type="file" id="formFile">
                </div>

                <ul class="list-group">
                    <li class="align-items-center border-bottom d-flex justify-content-between p-2">
                        <div class="img">
                            <img src="https://picsum.photos/50/50" alt="">
                        </div>
                        <div class="actions">
                            <a href="" class="btn-remove text-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <a href="{{route('admin.conteudos.index')}}" class="btn btn-secondary">Voltar</a>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </div>
</div>
@endsection