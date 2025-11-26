@extends('layouts.app-admin')
@section('content')
<div class="row mb-3">
    <div class="col">
        <h4>Criar Conteúdo</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.conteudos.store')}}" method="POST" id="formStore">       
        @csrf
            <div class="col-6">
                <div class="">
                    <label for="">Nome *</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>
            </div>
            <div class="col-3">
                    <label form="id_categoria">Categoria *</label>
                    <select name="id_categoria" class="form-select" id="" required>
                        <option value="">Selecione</option>
                        @foreach($categorias as $kCat => $vCat)
                            <option value="{{ $vCat->id }}">{{ $vCat->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                <label for="">Status</label>
                <div class="d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" required id="radioDefault1" value="ativo">
                        <label class="form-check-label" for="radioDefault1">
                            Ativo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" required id="radioDefault2" value="inativo">
                        <label class="form-check-label" for="radioDefault2">
                            inativo
                        </label>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
            <label for="">Descrição</label>
            <textarea name="descrição" id="" class="editor"></textarea>
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
                <a href="{{route('admin.conteudos.index')}}"
                 class="btn btn-secondary">Voltar</a>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-success d-inline-flex gap-3"> <div class="loading d-none">
                    <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                    </div> Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    $(document).ready(function () {

        $("#formStore").submit(function (e) {
            e.preventDefault();
            $(".loading").removeClass('d-none')
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                 if(data.status == 'ok'){
                    Swal.fire({
                        title: "Sucesso!",
                        text: "Conteúdo criado com sucesso!",
                        icon: "success"
                    });
                    $(".loading").addClass('d-none')
                    $("#formStore")[0].reset()
                 }
                }
            });
        })

    })

</script>
@endsection
