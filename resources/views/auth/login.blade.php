@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="margin-top: 20%">
                    <div class="panel-heading dted-search-h1">Busque o seu evento</div>
                    <div class="panel-body">
                        {{-- <form class="form-inline" role="form" method="POST" action="{{ url('/home') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="idAtividade" class="'col-md-4' control-label">Nome do evento</label>
                                <div class="col-md-8">
                                    @if ($atividades != null)
                                        {{ Form::select('idAtividade', $atividades, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Por favor, selecione a Atividade ...', 'data-parsley-required' => 'true']) }}
                                    @else
                                        <input type="text" value="Nenhuma atividade aberta no momento..." readonly="true"
                                            class="form-control" />
                                    @endif

                                    @if (isset($msg))
                                        <span class="help-block">
                                            <strong>{{ $msg }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary  pull-right">
                                        Buscar
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                        <form class="form" role="form" method="POST" action="{{ url('/home') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="idAtividade">Nome do evento</label>
                                @if ($atividades != null)
                                    {{ Form::select('idAtividade', $atividades, null, ['class' => 'form-control selectpicker dted-search-select', 'data-live-search' => 'true', 'title' => 'Por favor, selecione a Atividade ...', 'data-parsley-required' => 'true']) }}
                                @else
                                    <input type="text" value="Nenhuma atividade aberta no momento..." readonly="true"
                                        class="form-control dted-search-select" />
                                @endif
                                @if (isset($msg))
                                    <span class="help-block">
                                        <strong>{{ $msg }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn dted-search-button pull-right">Buscar</button>
                            </div>
                        </form>
                    </div>
                    <div class="dted-search-link">
                        <a class="pull-left">Edite seus dados cadastrais</a>
                        <a class="pull-right">Crie seu cadastro</a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar dados pessoais</div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'info']) }}
                        <div class="form-group">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('searchTaghomeForm', 'Procure por CPF/EMAIL:') }}
                            </div>
                            <div class='col-md-4'>
                                {{ Form::text('searchTaghomeForm', null, ['class' => 'form-control', 'placeholder' => 'CPF ou EMAIL', 'autocomplete' => 'off']) }}
                            </div>
                            <div class='col-md-4'>
                                {{ Form::submit('Procurar', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div> --}}
            @if (isset($firstSearch))
                <div class="col-md-8 col-md-offset-2">
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
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
