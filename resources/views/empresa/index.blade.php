@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listar Empresas</div>
                <div class="panel-body">
                    <a href="{{ url('/empresa/cadastrar') }}" class="btn btn-primary pull-right">
                        Novo
                    </a>
                    <hr>
                    {{-- Verifica se existem empresas --}}
                    @if($empresas->count())
                    {{-- Imprimindo nossos artigos --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome Fantasia</th>
                                <th>Razão Social</th>
                                <th>Usuário</th>
                                <th width="25%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->nome_fantasia }}</td>
                                <td>{{ $empresa->razao_social }}</td>
                                <td>{{ $empresa->usuario()->first()->nome }}</td>
                                <td>
                                    <div class="btn-block">
                                        <a href="{{ url('/empresa/carregar', $empresa->id) }}" class="btn btn-primary btn-xs"></span>
                                            Editar
                                        </a>
                                        <a href="{{ url('/empresa/remover', $empresa->id) }}" class="btn btn-danger btn-xs"></span>
                                            Remover
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h2>Nenhuma empresa cadastrada.</h2>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection