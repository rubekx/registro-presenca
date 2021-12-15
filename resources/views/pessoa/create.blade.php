@extends('layouts.app')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
    <div class="container h-50 transform-center-parent">
        <div class="row transform-center">
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

                <div class="panel panel-default dted-center-box">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Cadastrar Pessoa</div>
                    </div>

                    <div class="panel-body dted-font">
                        {{ Form::open(['route' => ['pessoa.store'], 'data-parsley-validate' => '']) }}
                        <div class="form-group row">
                            <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                                {{ Form::label('nome', 'Nome:') }}
                            </div>
                            <div class='col-md-8'>
                                {{ Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'ex.: Maria', 'data-parsley-required' => 'true', 'data-parsley-length' => '[2, 20]']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                                {{ Form::label('sobrenome', 'Sobrenome:') }}
                            </div>
                            <div class='col-md-8'>
                                {{ Form::text('sobrenome', null, ['class' => 'form-control', 'placeholder' => 'ex.: da Silva', 'data-parsley-required' => 'true', 'data-parsley-length' => '[2, 100]']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                                {{ Form::label('cpf', 'CPF:') }}
                            </div>
                            <div class='col-md-8'>
                                {{ Form::text('cpf', null, ['class' => 'form-control', 'placeholder' => '00000000000', 'data-parsley-required' => 'true', 'data-parsley-type' => 'digits', 'minlength' => '11', 'maxlength' => '11']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                                {{ Form::label('email', 'Email:') }}
                            </div>
                            <div class='col-md-8'>
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email@server', 'data-parsley-required' => 'true', 'data-parsley-type' => 'email', 'maxlength' => '100']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                                {{ Form::label('celular', 'Celular:') }}
                            </div>
                            <div class='col-md-8'>
                                {{ Form::text('celular', null, ['class' => 'form-control', 'placeholder' => '99911112222', 'data-parsley-type' => 'digits', 'maxlength' => '15']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                                {{ Form::label('sexo', 'Sexo:') }}
                            </div>
                            <div class='col-md-8'>
                                {{ Form::select('sexo', ['' => '...', 'F' => 'Feminino', 'M' => 'Masculino'], null, ['class' => 'form-control', 'data-parsley-required' => 'true']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4'></div>
                            <div class='col-md-4'>
                                {{ Form::submit('Cadastrar', ['class' => 'btn btn-block dted-search-button-submit']) }}
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

    {!! Html::script('js/parsley.min.js') !!}

@endsection
