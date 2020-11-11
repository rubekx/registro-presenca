@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buscar Atividade</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/home') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="idAtividade" class="col-md-4 control-label">Identificador da Atividade</label>
                            <div class="col-md-6">
                                @if($atividades!=NULL)
                                {{ Form::select('idAtividade', $atividades, null, array('class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Por favor, selecione a Atividade ...', 'data-parsley-required' => 'true')) }}
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
                                <button type="submit" class="btn btn-primary">
                                    Avançar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar dados pessoais</div>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'info' )) }}
                    <div class="form-group">
                        <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                            {{ Form::label('searchTaghomeForm', 'Procure por CPF/EMAIL:') }}
                        </div>
                        <div class='col-md-4'>
                            {{ Form::text('searchTaghomeForm', null, array('class' => 'form-control', 'placeholder' => 'CPF ou EMAIL', 'autocomplete' => 'off')) }}
                        </div>
                        <div class='col-md-4'>
                            {{ Form::submit('Procurar', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @if(isset($firstSearch))
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
                            {{ Form::open(array('route' => 'pessoa.create', 'method' => 'get' )) }}
                            {{ Form::submit('Sim, Cadastrar!', array('class' => 'btn btn-success')) }}
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