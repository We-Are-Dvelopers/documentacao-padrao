@extends('layouts.app-admin')
@section('content')
<h4>Editar Categoria</h4>
<input type="hidden" id="categoria_id" value="{{ $categoria->id }}">
    <div class="mb-3">
        <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST" id="formEdit">
            @csrf
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}">
    </div>
    <div class="d-flex align-items-center gap-3">
        <label class="d-flex align-items-center">
            <input type="radio" name="status" value="1">
            <span class="ms-1">Ativo</span>
        </label>

        <label class="d-flex align-items-center">
            <input type="radio" name="status" value="0">
            <span class="ms-1">Inativo</span>
        </label>
    </div>
    <div class="mb-3">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control" rows="4">{{ $categoria->descricao }}</textarea>
    </div>

    <div class="d-flex justify-content-between align-items-center">

    <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">
        Voltar
    </a>
    <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="PUT">
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </form>
</form>

    </div>
@endsection

@section('scripts')
<script>
    $('#formEdit').submit(function(e){
        e.preventDefault();

        let id = $('#categoria_id').val();

        $.ajax({
            url: '/admin/categorias/' + id + '/update',
            method: 'POST',
            data: $(this).serialize() + '&_method=PUT',
            success: function(){
                alert("Categoria atualizada!");
                window.location.href = "{{ route('admin.categorias.index') }}";
            },
            error: function(xhr){
                console.log(xhr.responseText);
            }
        });
    });
</script>
@endsection