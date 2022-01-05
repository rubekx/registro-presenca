@extends('layouts.app')
@section('content')
    @include('partials.messages')
    @if (!$firstSearch)
        <div class="row">
            <div class="col-lg-offset-2 col-lg-6 col-md-10 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group row dted-font">
                            {{ Form::open(['route' => 'pessoa.create', 'method' => 'get']) }}
                            <div class='col-md-8'>
                                <div class="dted-search-h1">Pessoa não encontrada, deseja se cadastrar?</div>
                            </div>
                            <div class="col-md-2" style='margin-top: 5px;'>
                                {{ Form::submit('Sim, Cadastrar!', ['class' => 'btn dted-search-button-submit']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row vcenter">
        <div class="col-lg-offset-2 col-lg-6 col-md-10 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="dted-search-h1">Busque o seu cadastro</div>
                </div>
                <div class="panel-heading">
                    {{ Form::open(['route' => 'info', 'class' => 'form']) }}
                    <div class="form-group row dted-font">
                        <div class='col-md-3' style='margin-top: 10px; text-align: left;'>
                            {{ Form::label('searchTag', 'Informação cadastral') }}
                        </div>
                        <div class='col-md-7' style='margin-top: 5px;'>
                            {{ Form::text('searchTag', null, ['class' => 'form-control', 'placeholder' => 'Digite seu CPF ou Email', 'autocomplete' => 'off']) }}
                        </div>
                        <div class='col-md-2' style='margin-top: 5px;'>
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
@endsection
