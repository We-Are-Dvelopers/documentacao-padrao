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

            <div class="row align-items-center">

                {{-- NOME --}}
                <div class="col-6">
                    <label for="">Nome *</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>

                {{-- CATEGORIA --}}
                <div class="col-3">
                    <label for="id_categoria">Categoria *</label>
                    <select name="id_categoria" class="form-select" required>
                        <option value="">Selecione</option>
                        @foreach($categorias as $vCat)
                            <option value="{{ $vCat->id }}">{{ $vCat->nome }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- STATUS --}}
                <div class="col-3">
                    <label for="">Status</label>
                    <div class="d-flex gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" required value="ativo">
                            <label class="form-check-label">
                                Ativo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" required value="inativo">
                            <label class="form-check-label">
                                Inativo
                            </label>
                        </div>
                    </div>
                </div>

            </div> {{-- row 1 --}}

            {{-- DESCRIÇÃO --}}
            <div class="row mt-3">
                <div class="col">
                    <label for="">Descrição</label>
                    <textarea name="descricao" class="summernote"></textarea>
                </div>
            </div>

            {{-- ARQUIVOS --}}
            <div class="row">
                <div class="col">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Localizar arquivos</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                    <ul class="list-group d-none">
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

            {{-- BOTÕES --}}
            <div class="row mt-3">
                <div class="col">
                    <a href="{{ route('admin.conteudos.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
                <div class="col text-end">
                    <button type="submit" class="btn btn-success d-inline-flex gap-3">
                        <div class="loading d-none">
                            <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                        </div>
                        Salvar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function () {

        $("#formStore").submit(function (e) {
            e.preventDefault();

            $(".loading").removeClass('d-none');

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {

                    if(data.status === 'ok'){
                        Swal.fire({
                            title: "Sucesso!",
                            text: "Conteúdo criado com sucesso!",
                            icon: "success"
                        });

                        $(".loading").addClass('d-none');
                        $("#formStore")[0].reset();
                    }

                },
                error: function(xhr){
                    console.error(xhr.responseText);
                    Swal.fire("Erro", "Falha ao criar conteúdo.", "error");
                    $(".loading").addClass('d-none');
                }
            });
        });

    });

        $(document).ready(function () {

        $("#formEdit").submit(function (e) {
            e.preventDefault();
            $(".loading").removeClass('d-none');

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    $(".loading").addClass('d-none');

                    if(data.status == 'ok'){
                        Swal.fire({
                            title: "Sucesso!",
                            text: "Conteúdo atualizado com sucesso!",
                            icon: "success"
                        }).then(() => {
                            window.location.href = "{{ route('admin.conteudos.index') }}";
                        });
                    }
                },
                error: function(xhr){
                    $(".loading").addClass('d-none');
                    Swal.fire({
                        title: "Erro!",
                        text: "Falha ao atualizar o conteúdo.",
                        icon: "error"
                    });
                    console.log(xhr.responseText);
                }
            });
        });

    });

$(document).ready(function () {

    $('.summernote').summernote({
        height: 250,
        lang: 'pt-BR',
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
            ['view', ['codeview']]
        ]
    });

    $("#formStore").submit(function (e) {
        e.preventDefault();
        $(".loading").removeClass('d-none');

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                if(data.status === 'ok'){
                    Swal.fire("Sucesso!", "Conteúdo criado com sucesso!", "success");
                    $(".loading").addClass('d-none');
                    $("#formStore")[0].reset();
                    $('.summernote').summernote('reset'); 
                }
            },
            error: function(xhr){
                $(".loading").addClass('d-none');
                Swal.fire("Erro", "Falha ao criar conteúdo.", "error");
            }
        });
    });

});
</script>
@endsection
