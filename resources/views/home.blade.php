@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tela Principal</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="container">
                        <div class="row row-list">
                            <div class="col-md-6">
                                <a href="{{route('submissao')}}">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text" align="center">
                                                Área de Submissão
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href={{url('http://secex.tce.am.gov.br/?page_id=4251')}}>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text" align="center">
                                                Área de Dados
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
@endsection
