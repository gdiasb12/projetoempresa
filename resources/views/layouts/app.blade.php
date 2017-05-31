<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="/entrar">Entrar</a></li>
                        @else

                        @if (Auth::check())
                        <!-- Branding Image -->
                        @if (session('user_info')->tipo == 'admin')
                        <li><a href="/usuario">
                            Cadastro de Usuários
                        </a></li>
                        @endif
                        <li><a href="/empresa">
                            Cadastro de Empresas
                        </a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('sair') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('sair') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            @if (count($errors) > 0)
            <div class="col-md-8 col-md-offset-2 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $("#cep").blur(function(event) {
        var cep = $(this).val();
        if(cep != ''){
            cep = cep.replace("-", "");
            $.get('/empresa/getcep/'+cep, function(retorno){
                console.log(retorno);
                if(typeof retorno != "undefined"){
                    (typeof retorno.logradouro != "undefined") ? $("#logradouro").val(retorno.logradouro) : '';
                    (typeof retorno.cidade != "undefined") ? $("#cidade").val(retorno.cidade+' - '+retorno.estado) : '';
                    (typeof retorno.bairro != "undefined") ? $("#bairro").val(retorno.bairro) : '';
                }
            }, 'json');
        }
    });

    $("#confirma-senha").blur(function(event) {
        if(($(this).val() != '') && ($(this).val() != $("#senha").val())){
            $(this).focus();
            alert('Confirmação de Senha incorreta!');
        }
    });
</script>

<!-- InputMask -->
<script src="{{ asset('/plugin/inputmask3x/inputmask.min.js') }}"></script>
<script src="{{ asset('/plugin/inputmask3x/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('/plugin/inputmask3x/inputmask.date.extensions.min.js') }}"></script>
<script src="{{ asset('/plugin/inputmask3x/inputmask.numeric.extensions.min.js') }}"></script>
<script type="text/javascript">

    $("#cnpj").inputmask("99.999.999/9999-99");
    $("#rg").inputmask("99.999.999-9");
    $("#cep").inputmask("99999-999");
    $('#telefone').inputmask('(99) 9999[9]-9999');
    $(".inputmask").inputmask();
</script>
</body>
</html>
