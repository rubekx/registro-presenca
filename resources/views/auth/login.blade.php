@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default dted-search-box">
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
                                        {{ Form::select('idAtividade', $atividades, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Por favor, selecione a Atividade ...', 'data-parsley-required' => 'true']) }}
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
            @if (isset($firstSearch))
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class=" dted-search-h1"> Cadastro?</div>
                        </div>
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
                                    {{ Form::submit('Sim, Cadastrar!', ['class' => 'btn btn dted-search-button-submit']) }}
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
