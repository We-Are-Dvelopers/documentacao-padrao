@extends('layouts.app-admin')

@section('content')
<div class="card p-4">
    <h4 class="mb-4">Editar Conteúdo</h4>

    <form id="formEdit" method="POST" action="{{ route('admin.conteudos.update', $conteudo->id) }}">
        @csrf
        @method('PUT')

        {{-- Nome --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Nome</label>
            <input type="text" name="nome" class="form-control"
                value="{{ $conteudo->nome }}" required>
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Categoria</label>
            <select name="id_categoria" class="form-select" required>
                <option value="">Selecione</option>

                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $conteudo->id_categoria == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Status</label>
            <div class="d-flex gap-3">
                <label class="d-flex align-items-center">
                    <input type="radio" name="status" value="ativo"
                        {{ $conteudo->status == 'ativo' ? 'checked' : '' }}>
                    <span class="ms-1">Ativo</span>
                </label>

                <label class="d-flex align-items-center">
                    <input type="radio" name="status" value="inativo"
                        {{ $conteudo->status == 'inativo' ? 'checked' : '' }}>
                    <span class="ms-1">Inativo</span>
                </label>
            </div>
        </div>

        {{-- Descrição --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">Descrição</label>
            <textarea name="descricao" class="summernote" rows="5">{{ $conteudo->descricao }}</textarea>
        </div>

        {{-- Botões --}}
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
@endsection

@section('scripts')
<script>
$(document).ready(function () {

    $("#formEdit").submit(function (e) {
        e.preventDefault();
        $(".loading").removeClass('d-none');

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {

                $(".loading").addClass('d-none');

                Swal.fire({
                    title: "Sucesso!",
                    text: "Conteúdo atualizado com sucesso!",
                    icon: "success"
                }).then(() => {
                    window.location.href = "{{ route('admin.conteudos.index') }}";
                });

            },
            error: function (xhr) {
                $(".loading").addClass('d-none');
                console.log(xhr.responseText);

                Swal.fire({
                    title: "Erro!",
                    text: "Falha ao atualizar o conteúdo.",
                    icon: "error"
                });
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

    $("#formEdit").submit(function (e) {
        e.preventDefault();
        $(".loading").removeClass('d-none');

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function () {
                $(".loading").addClass('d-none');

                Swal.fire("Sucesso!", "Conteúdo atualizado com sucesso!", "success")
                    .then(() => {
                        window.location.href = "{{ route('admin.conteudos.index') }}";
                    });
            },
            error: function () {
                $(".loading").addClass('d-none');
                Swal.fire("Erro!", "Falha ao atualizar o conteúdo.", "error");
            }
        });
    });

});
</script>
@endsection