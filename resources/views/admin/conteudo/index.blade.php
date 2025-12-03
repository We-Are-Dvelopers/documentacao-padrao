@extends('layouts.app-admin')
@section('content')

<div class="row mb-3">
    <div class="col">
        <h4>Conteúdo</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col">
                <h5>Listagem</h5>
            </div>
            <div class="col text-end">
                <a href="{{ route('admin.conteudos.create') }}" 
                   class="btn btn-primary btn-sm">Adicionar</a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($conteudos as $kConteudo => $vConteudo)
                <tr>
                    <td>{{ $vConteudo->id }}</td>
                    <td>{{ $vConteudo->nome }}</td>
                    <td>{{ $vConteudo->slug }}</td>
                    <td>{{ $vConteudo->status }}</td>

                    <td class="text-end">
                        <a href="#" 
                           data-id="{{ $vConteudo->id }}" 
                           class="btn btn-icon-only btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>

                        <a href="{{ route('admin.conteudos.edit', $vConteudo->id) }}" 
                           class="btn btn-icon-only btn-light">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $conteudos->links() !!}
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).on('click', '.btn-danger', function () {

        if (!confirm("Tem certeza que deseja excluir este conteúdo?")) return;

        let id = $(this).data('id');

        $.ajax({
            url: '/admin/conteudos/' + id + '/destroy',
            type: 'DELETE',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function () {
                location.reload();
            }
        });
    });
    
</script>
@endsection
