@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('partials.messages')
                @include('partials.atividade.info')
                <div class="panel panel-default">
                    <div class="panel-heading">Procurar Cadastro</div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'info']) }}
                        <div class="form-group">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('searchTag', 'Procure por CPF/EMAIL:') }}
                            </div>
                            <div class='col-md-4'>
                                {{ Form::text('searchTag', null, ['class' => 'form-control', 'placeholder' => 'CPF ou EMAIL', 'autocomplete' => 'off']) }}
                            </div>
                            <div class='col-md-4'>
                                {{ Form::submit('Procurar', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                @if (!$firstSearch)
                    <div class="panel panel-default">
                        <div class="panel-heading">Criar Cadastro??</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                    Pessoa não encontrada!
                                </div>
                                <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                    Deseja se cadastrar?
                                </div>
                                <div class='col-md-4'>
                                    {{ Form::open(['route' => 'pessoa.create', 'method' => 'get']) }}
                                    {{ Form::submit('Sim, Cadastrar!', ['class' => 'btn btn-success']) }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
