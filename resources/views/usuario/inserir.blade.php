@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar Usuário</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/usuario/inserir">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo (Nivel)</label>
                            <div class="col-md-6">
                                <input type="radio" name="tipo" value="admin"> Administrador<br>
                                <input type="radio" name="tipo" value="cliente"> Cliente<br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="senha" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="senha" type="password" class="form-control" name="senha" required>

                                @if ($errors->has('senha'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('senha') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirma-senha" class="col-md-4 control-label">Confirmar Senha</label>

                            <div class="col-md-6">
                                <input id="confirma-senha" type="password" class="form-control" name="password_confirmation">
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
