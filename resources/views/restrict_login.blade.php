@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default dted-search-box">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Atividade Privada </div>
                        <h5>Para registrar sua presença neste evento é necessário informar a senha fornecida pela
                            administração</h5>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'restrict_login', 'method' => 'post', 'class' => 'form']) !!}
                        @if (isset($atv_id))
                            <input type="hidden" id="atv_id" name="atv_id" value="{{ $atv_id }}">
                        @endif
                        <div class="form-group">
                            <label for="idAtividade" class="control-label">Senha do Evento</label>
                            <input id="idAtividade" type="idAtividade" class="form-control dted-search-field"
                                name="idAtividade" autocomplete="off" required autofocus
                                placeholder="Digite a senha do evento">
                            @if (isset($msg))
                                <span class="help-block"><strong>{{ $msg }}</strong> </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="pull-right" style="margin:5px">
                                <button type="submit" class="btn dted-search-button-submit"> Entrar </button>
                                <a href="{{ url('login') }}" class="btn dted-search-button-reset">Voltar</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-footer panel-default">
                        <h5>{!! '<b>' . $tema . '</b>' !!}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
