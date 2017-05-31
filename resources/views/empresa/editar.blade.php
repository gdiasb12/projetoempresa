@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alterar Empresa</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/empresa/alterar/{{ $empresa->id }}">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nome_fantasia" class="col-md-4 control-label">Nome Fantasia</label>
                            <div class="col-md-6">
                                <input id="nome_fantasia" type="text" class="form-control" name="nome_fantasia" value="{{ $empresa->nome_fantasia }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="razao_social" class="col-md-4 control-label">Razão Social</label>
                            <div class="col-md-6">
                                <input id="razao_social" type="text" class="form-control" name="razao_social" value="{{ $empresa->razao_social }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">CNPJ</label>
                            <div class="col-md-6">
                                <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ $empresa->cnpj }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>
                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{ $empresa->telefone }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $empresa->email }}" required autofocus>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="cep" class="col-md-4 control-label">CEP</label>
                            <div class="col-md-4">
                                <input id="cep" type="text" class="form-control" name="cep" value="{{ $empresa->cep_endereco }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="logradouro" class="col-md-4 control-label">Logradouro</label>
                            <div class="col-md-4">
                                <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ $empresa->logradouro }}" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <input id="numero" type="number" class="form-control" name="numero" placeholder="Número" value="{{ $empresa->numero_endereco }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bairro" class="col-md-4 control-label">Bairro</label>
                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{ $empresa->bairro_endereco }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cidade" class="col-md-4 control-label">Cidade</label>
                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control" name="cidade" value="{{ $empresa->cidade_endereco }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
