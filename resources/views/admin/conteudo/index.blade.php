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
                            <a href="{{route('admin.conteudos.create')}}" 
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href=""><i class="fa-solid fa-angle-right"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection