@extends('layouts.app')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
<div class="container h-50 transform-center-parent">
    <div class="row transform-center">
        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Mostrar Cadastro de Pessoa</div>                    
                    </div>
                    <div class="panel-body dted-font">
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                Nome:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->nome }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                Sobrenome:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->sobrenome }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                CPF:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->cpf }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                Email:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->email }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                Celular:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->celular }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                Sexo:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->sexo }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4'></div>
                            <div class='col-md-2' style='margin-top: 10px;'>
                                {!! Html::linkRoute('pessoa.edit', 'Editar', [$pessoa->encryptId()], ['class' => 'btn dted-search-button-submit btn-block']) !!}                              
                            </div>
                            <div class='col-md-2' style='margin-top: 10px;'>
                                {!! Html::linkRoute('profGeral.create', 'Avançar', null, ['class' => 'btn dted-search-button-submit btn-block']) !!}
                            </div>
                            <div class='col-md-4'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
