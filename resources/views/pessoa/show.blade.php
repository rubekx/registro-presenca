@extends('layouts.app')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Mostrar Cadastro de Pessoa</div>

                <div class="panel-body">
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                Nome:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->nome }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                Sobrenome:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->sobrenome }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                CPF:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->cpf }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                Email:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->email }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                Celular:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->celular }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                Sexo:
                            </div>
                            <div class='col-md-5'>
                                {{ $pessoa->sexo }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4'></div>
                            <div class='col-md-2'>
                                {!! Html::linkRoute('pessoa.edit', 'Editar', array($pessoa->id), array('class' => 'btn btn-primary btn-block')) !!}
                            </div>
                            <div class='col-md-2'>
                                {!! Html::linkRoute('profGeral.create', 'Avançar', null, array('class' => 'btn btn-primary btn-block')) !!}
                            </div>
                            <div class='col-md-4'></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection