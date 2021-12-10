@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                @include('partials.messages')
                @if (!$firstSearch)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="dted-search-h1">Criar Cadastro?</div>
                        </div>
                        <div class="panel-body dted-font">
                            <div class="form-group">
                                <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                    Pessoa não encontrada!
                                </div>
                                <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                    Deseja se cadastrar?
                                </div>
                                <div class='col-md-4'>
                                    {{ Form::open(['route' => 'pessoa.create', 'method' => 'get']) }}
                                    {{ Form::submit('Sim, Cadastrar!', ['class' => 'btn dted-search-button-submit']) }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Busque o seu cadastro</div>
                    </div>                
                    <div class="panel-heading " style="padding-bottom: 50px">
                        {{ Form::open(['route' => 'info', 'class' => 'form']) }}
                        <div class="form-group">
                            <div class='form-group'>
                                {{ Form::label('searchTag', 'Informação cadastral') }}
                            </div>
                            <div class='form-group'>
                                {{ Form::text('searchTag', null, ['class' => 'form-control dted-search-field', 'placeholder' => 'Digite seu CPF ou Email', 'autocomplete' => 'off']) }}
                            </div>
                            <div class='form-group'>
                                {{ Form::submit('Procurar', ['class' => 'btn dted-search-button-submit  pull-right']) }}
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
@section('jscript')
    <script type="text/javascript">
        document.getElementById("cancelar-registro").onclick = function() {
            location.href = "{{ route('logout') }}";
        };
    </script>
@endsection
