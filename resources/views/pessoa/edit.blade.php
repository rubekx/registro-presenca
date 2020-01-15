@extends('layouts.app')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.messages')

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Editar Pessoa</div>

                <div class="panel-body">
                    {{ Form::model($pessoa, ['route' => ['pessoa.update', $pessoa->id], 'method' => 'PUT', 'data-parsley-validate' => '']) }}
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('nome', 'Nome:') }}
                            </div>
                            <div class='col-md-5'>
                                {{ Form::text('nome', null, array('class' => 'form-control', 'placeholder' => 'ex.: Maria', 'data-parsley-required' => 'true', "data-parsley-length"=>"[2, 20]" )) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('sobrenome', 'Sobrenome:') }}
                            </div>
                            <div class='col-md-8'>
                                {{ Form::text('sobrenome', null, array('class' => 'form-control', 'placeholder' => 'ex.: da Silva', 'data-parsley-required' => 'true', "data-parsley-length"=>"[2, 100]")) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('cpf', 'CPF:') }}
                            </div>
                            <div class='col-md-4'>
                                {{ Form::text('cpf', null, array('class' => 'form-control', 'placeholder' => '00000000000', 'data-parsley-required' => 'true', "data-parsley-type" => "digits", "maxlength" =>"11")) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('email', 'Email:') }}
                            </div>
                            <div class='col-md-6'>
                                {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'email@server', 'data-parsley-required' => 'true', 'data-parsley-type' => 'email', "maxlength"=>"100")) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('celular', 'Celular:') }}
                            </div>
                            <div class='col-md-3'>
                                {{ Form::text('celular', null, array('class' => 'form-control', 'placeholder' => '99911112222', "data-parsley-type" => "digits", "maxlength"=>"15")) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('sexo', 'Sexo:') }}
                            </div>
                            <div class='col-md-4'>
                                {{ Form::select('sexo', array('F' => 'Feminino', 'M' => 'Masculino'), null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4'></div>
                            <div class='col-md-4'>
                                {{ Form::submit('Salvar', array('class' => 'btn btn-primary btn-block')) }}
                            </div>
                            <div class='col-md-4'></div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('post-script')

    {!! Html::script("js/parsley.min.js") !!}

@endsection