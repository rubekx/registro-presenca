@extends('layouts.app')
@section('content')
@if (isset($firstSearch))
<div class="row">
    <div class="col-lg-offset-2 col-lg-6 col-md-10 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class=" dted-search-h1">Cadastro?</div>
            </div>
            <div class="panel-body">
                <div class="form-group dted-font">
                    <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                        Pessoa não encontrada!
                    </div>
                    <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                        Deseja se cadastrar?
                    </div>
                    <div class='col-md-4'>
                        {{ Form::open(['route' => 'pessoa.create', 'method' => 'get']) }}
                        {{ Form::submit('Sim, Cadastrar!', ['class' => 'btn btn dted-search-button-submit']) }}
                        {{ Form::close() }}
                    </div>
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
                    <div class="dted-search-h1">Busque o seu evento</div>
                </div>
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('/home') }}">
                        {{ csrf_field() }}
                        <div class="form-group row dted-font">
                            <div class='col-md-3' style='margin-top: 5px; text-align: left;'>
                                <label for="idAtividade">Nome do evento</label>
                            </div>
                            <div class='col-md-9'>
                                @if (isset($atividades))
                                    {{ Form::select('idAtividade', $atividades, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Por favor, selecione a Atividade ...', 'data-size' => '4', 'data-parsley-required' => 'true']) }}
                                @else
                                    <input type="text" value="Nenhuma atividade aberta no momento..." readonly="true"
                                        class="form-control" />
                                @endif
                            </div>
                        </div>
                        @include('partials.messages')
                        <div class="form-group">
                            <button type="submit" class="btn dted-search-button-submit pull-right">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="dted-search-link">
                    <a class="pull-left" href="{{ route('pessoa.buscar') }}">Edite seus dados cadastrais</a>
                    <a class="pull-right" href="{{ route('pessoa.create') }}">Crie seu cadastro</a>
                </div>
            </div>
        </div>
    </div>
@endsection
