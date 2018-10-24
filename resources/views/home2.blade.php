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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <a class="nav-link" href="{{ route('login') }}">Logar</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
</body>
</html>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submissão da Proposta e Documentos</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <form method="post" action="{{url('home')}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="increment control-group col-md-12">
                            <label for="name" class="text-md-right">Descrição da Prosposta 1 (Anexo VI)</label>
                            <input type="file" name="filename[]" class="form-control">
                            <label for="name" class="text-md-right" style="margin-top:10px">Declaração Originalidade 1 (Anexo IV/V)</label>
                            <input type="file" name="filename[]" class="form-control">
                            <label for="name" class="text-md-right" style="margin-top:10px">Declaração Coordenador 1 (Anexo III)</label>
                            <input type="file" name="filename[]" class="form-control">
                        </div>
                        <div class="clone hide">
                            <div class="col-md-12 extra">
                                <label for="name" class="text-md-right">Descrição da Prosposta 2 (Anexo VI)</label>
                                <input type="file" name="filename[]" class="form-control">
                                <label for="name" class="text-md-right" style="margin-top:10px">Declaração Originalidade 2 (Anexo IV/V)</label>
                                <input type="file" name="filename[]" class="form-control">
                                <label for="name" class="text-md-right" style="margin-top:10px">Declaração Coordenador 2 (Anexo III)</label>
                                <input type="file" name="filename[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="text-md-right" style="margin-top:10px">RG</label>
                            <input type="file" name="filename[]" class="form-control">
                            <label for="name" class="text-md-right" style="margin-top:10px">CPF/CNPJ</label>
                            <input type="file" name="filename[]" class="form-control">
                            <label for="name" class="text-md-right" style="margin-top:10px;">Comprovante Residencial</label>
                            <input type="file" name="filename[]" class="form-control" style="margin-bottom: 10px">
                        </div>
                        {{--<div class="container">--}}
                            {{--<div class="row">--}}
                                <div class="col-md-5" style="margin-bottom: 10px">
                                    <button type="submit" class="btn btn-primary" >Enviar</button>
                                </div>
                                <div class="col-md-3">
                                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Adicionar 2 Proposta</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remover 2 Proposta</button>
                                </div>
                            {{--</div>--}}
                        {{--</div>--}}




                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $j(document).ready(function () {
            var x = 0;
            $(".btn-success").click(function () {
                var html = $(".clone").html();
                if (x < 1) {
                    $(".increment").after(html);
                    x = x + 1;
                }
            });
            $("body").on("click", ".btn-danger", function () {
                $(".extra").remove();
                x = 0;

            });
            $j(".hide").hide();
        });
    </script>
