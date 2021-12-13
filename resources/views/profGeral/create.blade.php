@extends('layouts.app')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

    {!! Html::style('bootstrap-toggle/bootstrap-toggle.min.css') !!}

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

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
                                <label for="vinculo-ufma">Vínculo com a UFMA</label>
                            </div>
                            <div class='col-md-8'>
                                <input id="vinculo-ufma" type="checkbox" data-toggle="toggle" data-on="SIM" data-off="NÂO"
                                    data-onstyle="danger">
                            </div>
                        </div>

                        <div id="viculo-select" class="form-group row">
                            <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                <label for="tipo_participante">Tipo de vínculo</label>
                            </div>
                            <div class='col-md-8'>
                                {{ Form::select('tipo_participante', $tipoParticipante, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'data-live-search-normalize' => 'true', 'data-size' => '5', 'title' => 'Por favor, selecione seu vínculo ...']) }}
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
        $(function() {
            $('#vinculo-ufma').prop('checked', false).change()
            $("[name='tipo_participante']").attr('data-parsley-required', false)
            $('#viculo-select').hide();

            $('#vinculo-ufma').change(function() {
                if ($('#vinculo-ufma').prop('checked') == true) {
                    $('#viculo-select').show();
                    $("[name='tipo_participante']").attr('data-parsley-required', true)
                } else {
                    $('#viculo-select').hide();
                    $("[name='tipo_participante']").attr('data-parsley-required', false)
                }
            })
        })
    </script>

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

    {!! Html::script('bootstrap-toggle/bootstrap-toggle.min.js') !!}

@endsection
