@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listar Usuários</div>
                <div class="panel-body">
                    <a href="{{ url('/usuario/cadastrar') }}" class="btn btn-primary pull-right">
                        Novo
                    </a>
                    <hr>
                    {{-- Verifica se existem usuarios --}}
                    @if($usuarios->count())
                    {{-- Imprimindo nossos artigos --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Nivel</th>
                                <th width="25%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nome }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ ($usuario->tipo == 'admin'?'Administrador':'Cliente') }}</td>
                                <td>
                                    <div class="btn-block">
                                        <a href="{{ url('/usuario/carregar', $usuario->id) }}" class="btn btn-primary btn-xs"></span>
                                            Editar
                                        </a>
                                        <a href="{{ url('/usuario/remover', $usuario->id) }}" class="btn btn-danger btn-xs"></span>
                                            Remover
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h2>Nenhum usuário cadastrado.</h2>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection