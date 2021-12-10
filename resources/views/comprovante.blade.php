@extends('layouts.app')

@section('title', 'Comprovante de Presença')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Comprovante de Presença</div>
                    <div class="panel-body">
                        <h2 style="margin: 20px auto; text-align: center; width: 400px; color: green;">Presença confirmada!
                        </h2>
                        @include('partials.messages')

                        <div class="form-group row">
                            <div class="col-md-6">
                                <span style="font-weight: bolder;">{{ $pessoa }}</span>
                                declara presente na atividade, cujo tema é {{ $atividade }}.
                                <div class="form-group row center-block" style="margin-top: 10px;">
                                    <b>Chave</b>: {{ $key }}
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    Local: {{ $local }}
                                </div>
                                <div class="form-group row">
                                    Endereço IP: {{ $ip }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-block btn-success" href="{{ url('/logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Ok
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
