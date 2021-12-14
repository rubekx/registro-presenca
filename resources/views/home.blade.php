@extends('layouts.app')

@section('content')
    <div class="container h-50 transform-center-parent">
        <div class="row transform-center">
            @include('partials.messages')
            @if (!$firstSearch)
                <div class="col-md-8 col-md-offset-2" style="padding-top: 10%">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group row dted-font">
                                {{ Form::open(['route' => 'pessoa.create', 'method' => 'get']) }}
                                <div class='col-md-8' style='margin-top: 5px; text-align: left;'>
                                    <div class="dted-search-h1 text-center">Pessoa não encontrada, deseja se cadastrar?
                                    </div>
                                </div>
                                <div class="col-md-2"  style='margin-top: 5px;'>
                                    {{ Form::submit('Sim, Cadastrar!', ['class' => 'btn dted-search-button-submit']) }}
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Busque o seu cadastro</div>
                    </div>
                    <div class="panel-heading">
                        {{ Form::open(['route' => 'info', 'class' => 'form']) }}
                        <div class="form-group row dted-font">
                            <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                                {{ Form::label('searchTag', 'Informação cadastral') }}
                            </div>
                            <div class='col-md-7'>
                                {{ Form::text('searchTag', null, ['class' => 'form-control', 'placeholder' => 'Digite seu CPF ou Email', 'autocomplete' => 'off']) }}
                            </div>
                            <div class='col-md-2'>
                                {{ Form::submit('Procurar', ['class' => 'btn dted-search-button-submit']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <div class="panel-heading">
                        @include('partials.atividade.info')
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
