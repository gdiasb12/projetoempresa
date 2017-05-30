@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Empresa</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/empresa/inserir">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nomefantasia" class="col-md-4 control-label">Nome Fantasia</label>
                            <div class="col-md-6">
                                <input id="nomefantasia" type="text" class="form-control" name="nomefantasia" value="{{ old('nomefantasia') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="razaosocial" class="col-md-4 control-label">Razão Social</label>
                            <div class="col-md-6">
                                <input id="razaosocial" type="text" class="form-control" name="razaosocial" value="{{ old('razaosocial') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">CNPJ</label>
                            <div class="col-md-6">
                                <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>
                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="cep" class="col-md-4 control-label">CEP</label>
                            <div class="col-md-4">
                                <input id="cep" type="text" class="form-control" name="cep" value="{{ old('cep') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logradouro" class="col-md-4 control-label">Logradouro</label>
                            <div class="col-md-4">
                                <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ old('logradouro') }}" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <input id="numero" type="number" class="form-control" name="numero" placeholder="Número" value="{{ old('numero') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bairro" class="col-md-4 control-label">Bairro</label>
                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cidade" class="col-md-4 control-label">Cidade</label>
                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" required autofocus>
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

