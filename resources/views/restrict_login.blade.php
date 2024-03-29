@extends('layouts.app')

@section('content')
    <div class="row vcenter">
        <div class="col-lg-offset-2 col-lg-6 col-md-10 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="dted-search-h1">Atividade Privada </div>
                    <h5 class="dted-font">Para registrar sua presença neste evento é necessário informar a senha
                        fornecida pela
                        administração</h5>
                </div>
                <div class="panel-body">
                    @include('partials.messages')
                    {!! Form::open(['route' => 'restrict_login', 'method' => 'post', 'class' => 'form']) !!}
                    @if (isset($atv_id))
                        <input type="hidden" id="atv_id" name="atv_id" value="{{ $atv_id }}">
                    @endif
                    <div class="form-group row dted-font">
                        <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                            <label for="idAtividade" class="control-label">Senha do Evento</label>
                        </div>
                        <div class='col-md-9'>
                            <input id="idAtividade" type="idAtividade" class="form-control dted-search-field"
                                name="idAtividade" autocomplete="off" required autofocus
                                placeholder="Digite a senha do evento">
                            @if (isset($msg))
                                <span class="help-block"><strong>{{ $msg }}</strong> </span>
                            @endif
                        </div>
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
                    <h5 class="dted-font">{!! '<b>' . $tema . '</b>' !!}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
