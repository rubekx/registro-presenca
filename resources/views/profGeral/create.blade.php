@extends('layouts.app')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
<div class="container h-50 transform-center-parent">
    <div class="row transform-center">
        <div class="col-lg-10 col-md-12 col-lg-offset-1">
                @include('partials.messages')
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Cadastrar Profissão e Local de Nascimento</div>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'profGeral.store', 'data-parsley-validate' => '']) }}
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                <label for="cbo">CBO:</label>
                            </div>
                            <div class='col-md-8'>
                                {{ Form::select('cbo', $cbos, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'data-live-search-normalize' => 'true', 'data-size' => '5', 'title' => 'Por favor, selecione sua Profissão ...', 'data-parsley-required' => 'true']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                <label for="tipo_participante">Vínculo</label>
                            </div>
                            <div class='col-md-8'>
                                {{ Form::select('tipo_participante', $tipoParticipante, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'data-live-search-normalize' => 'true', 'data-size' => '5', 'title' => 'Por favor, selecione seu estado ...', 'data-parsley-required' => 'true']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                <label for="estado">Estado:</label>
                            </div>
                            <div class='col-md-8'>
                                {{ Form::select('estado', $estados, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'data-live-search-normalize' => 'true', 'data-size' => '5', 'title' => 'Por favor, selecione seu estado ...', 'data-parsley-required' => 'true']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                <label for="municipio">Município:</label>
                            </div>
                            <div class='col-md-8'>
                                <select name="municipio" id="municipio" class="form-control selectpicker"
                                    data-live-search="true" data-size='5' data-live-search-normalize='true'
                                    title="Selecione sua cidade ..." data-parsley-required='true'>
                                    {{-- @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->ibge }}">{{ $municipio->nome }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4'></div>
                            <div class='col-md-4'>
                                {{ Form::submit('Cadastrar', ['class' => 'btn dted-search-button-submit btn-block']) }}
                            </div>
                            <div class='col-md-4'></div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('post-script')
    <script type="text/javascript">
        $('select[name=estado]').change(function() {
            var idEstado = $(this).val();
            $.get('/get-municipios/' + idEstado, function(municipios) {
                $('select[name=municipio]').empty();
                $.each(municipios, function(key, value) {
                    $('select[name=municipio]').append('<option value=' + value.ibge + '>' + value
                        .nome + '</option>');
                });
                $('select[name=municipio]').selectpicker('refresh');
            });
        });
    </script>
    {!! Html::script('js/parsley.min.js') !!}
@endsection
