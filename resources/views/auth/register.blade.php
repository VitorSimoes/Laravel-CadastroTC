<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>var $j = jQuery.noConflict();</script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="add_fields_placeholder form-group row">
                            {!! Form::label('pessoa','Pessoa',['class'=>'col-md-4 col-form-label text-md-right'])!!}
                            <div class="col-md-6">
                                <input type="radio" id="pessoa0" name="pessoa" checked value="0"> Física
                                <input type="radio" id="pessoa1" name="pessoa" value="1"> Jurídica
                            </div>
                        </div>
                        <div class="add_fields_placeholder2 form-group row">
                            {!! Form::label('servidor','Servidor Público?',['class'=>'col-md-4 col-form-label text-md-right'])!!}
                            <div class="col-md-6">
                                <input type="radio" id="servidor0" name="servidor" checked value="0"> Não
                                <input type="radio" id="servidor1" name="servidor" value="1"> Sim
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome Completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('cpf_cnpj_label','CNPJ', array('class' =>  'pjuridica col-md-4 col-form-label text-md-right'))!!}
                            {!! Form::label('cpf_cnpj_label','CPF', array('class' =>'pfisico col-md-4 col-form-label text-md-right'))!!}
                            <div class="col-md-6">
                                <input id="cpf_cnpj" type="text"
                                       class="form-control{{ $errors->has('cpf_cnpjc') ? ' is-invalid' : '' }}"
                                       name="cpf_cnpj" value="{{ old('cpf_cnpj') }}" required>
                                @if ($errors->has('cpf_cnpj'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cpf_cnpj') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="pfisico form-group row">
                            {!! Form::label('rg','RG',array('class'=>'pfisico col-md-4 col-form-label text-md-right'))!!}
                            <div class="col-md-6">
                                {!! Form::input('text', 'rg', null, ['class' => 'rg form-control', 'size' => 10 , 'autocomplete'=>'off']) !!}
                            </div>
                        </div>

                        <div class="pjuridica form-group row">
                            {!! Form::label('nome_empresa_label','Nome da Empresa',array('class'=>'pjuridica col-md-4 col-form-label text-md-right'))!!}
                            <div class="col-md-6">
                                {!! Form::input('text', 'nome_empresa', null, ['class' => 'pjuridica form-control', 'size' => 10 , 'autocomplete'=>'off']) !!}
                            </div>
                        </div>

                        <div class="pjuridica form-group row">
                            {!! Form::label('cpf_coordenador_label','CPF Coordenador',array('class'=>'pjuridica col-md-4 col-form-label text-md-right'))!!}
                            <div class="col-md-6">
                                {!! Form::input('text', 'cpf_coordenador', null, ['class' => 'pjuridica cpf form-control', 'size' => 10 , 'autocomplete'=>'off']) !!}
                            </div>
                        </div>

                        <div class="pservidor form-group row">
                            {!! Form::label('nome_orgao_label','Nome Orgão',array('class'=>'pservidor col-md-4 col-form-label text-md-right'))!!}
                            <div class="col-md-6">
                                {!! Form::input('text', 'nome_orgao', null, ['class' => 'pservidor cpf form-control', 'size' => 10 , 'autocomplete'=>'off']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
                            <div class="col-md-6">
                                <input id="telefone" type="text"
                                       class=" telefone form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}"
                                       name="telefone" value="{{ old('telefone') }}" required>

                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">Confirmação de Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $j("#cpf_cnpj").keydown(function () {
        try {
            $j("#cpf_cnpj").unmask();
        } catch (e) {
        }

        var tamanho = $j("#cpf_cnpj").val().length;

        if (tamanho < 11) {
            $j("#cpf_cnpj").mask("999.999.999-99");
        } else if (tamanho >= 11) {
            $j("#cpf_cnpj").mask("99.999.999/9999-99");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function () {
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $j(this).val();
        $j(this).val('');
        $j(this).val(currentValue);
    });
    $j(function () {
        $j('.phone_with_ddd').mask('(00) 0000-0000');
        $j('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $j('#rg').mask('0000000-0', {reverse: true});
        $j  ('.cpf').mask('000.000.000-00', {reverse: true});

        var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

        $j('.telefone').mask(SPMaskBehavior, spOptions);

        $j(".bt-mask-it").click(function () {
            $(".mask-on-div").mask("000.000.000-00");
            $(".mask-on-div").fadeOut(500).fadeIn(500)
        })

        $j('pre').each(function (i, e) {
            hljs.highlightBlock(e)
        });
    });
    $j(document).ready(function()
    {
        $j(".add_fields_placeholder").change(function()
        {
            if ($("#pessoa1").is(":checked"))
            {
                $j(".pjuridica").show();
                $j(".pfisico").hide();
            }
            else
            {
                $j(".pjuridica").hide();
                $j(".pfisico").show();
            }
        });
        $j(".pjuridica").hide();

    });
    $j(document).ready(function()
    {
        $j(".add_fields_placeholder2").change(function()
        {
            if ($("#servidor1").is(":checked"))
            {
                $j(".pservidor").show();
            }
            else
            {
                $j(".pservidor").hide();
            }
        });
        $j(".pservidor").hide();
    });

</script>
{{--<script>--}}

{{--</script>--}}


