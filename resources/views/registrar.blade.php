@extends('layouts.app')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

    {!! Html::style('bootstrap-toggle/bootstrap-toggle.min.css') !!}
@endsection

@section('title', 'Finalizar Informações')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3  dted-font">
                {{ Form::open(['route' => 'persist', 'data-parsley-validate' => '']) }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Informe de onde você está acessando</div>
                    </div>
                    <div class="panel-body">
                        @include('partials.messages')

                        <div class="form-group">
                            <div class="form-group row" style='padding-botton:100px'>
                                <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                    <label for="ip">IP:</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" readonly="readonly" name="ip" id="ip" value="{{ $ip }}"
                                        class="form-control" data-parsley-required='true' />
                                </div>
                            </div>
                            @if ($profGeral != null && $profGeral->tipo_participante == null)
                                <div class="form-group row">
                                    <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                        <label for="vinculo-ufma">Vínculo com a UFMA</label>
                                    </div>
                                    <div class='col-md-8'>
                                        <input id="vinculo-ufma" name="vinculo_ufma" type="checkbox" data-toggle="toggle" data-on="SIM"
                                            data-off="NÂO" data-onstyle="danger">
                                    </div>
                                </div>

                                <div id="viculo-select" class="form-group row">
                                    <div class='col-md-4' style='margin-top: 5px; text-align: left;'>
                                        <label for="tipo_participante">Tipo de vínculo</label>
                                    </div>
                                    <div class='col-md-8'>
                                        {{ Form::select('tipo_participante', $tipoParticipante, $profGeral->tipo_participante, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'data-live-search-normalize' => 'true', 'data-size' => '5', 'title' => 'Por favor, selecione seu vínculo ...']) }}
                                    </div>
                                </div>
                            @endif
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
                                        data-live-search="true" data-live-search-normalize='true' data-size='5' ,
                                        title="Selecione sua cidade ..." data-parsley-required='true'>
                                        {{-- @foreach ($municipios as $municipio)
                                                                  <option value="{{ $municipio->ibge }}">{{ $municipio->nome }}</option>
                                                              @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if (Session::has('atividade'))
                            {{ Form::submit('Avançar', ['class' => 'btn dted-search-button-submit center-block']) }}
                        @endif
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

    <script type="text/javascript">
        $(function() {
            let vinculo_ufma = "{{ $profGeral->tipo_participante }}";
            let vinculo_botao = false;
            if (['1', '', null, undefined].includes(vinculo_ufma)) {
                $('#vinculo-ufma').prop('checked', false).change()
                $("[name='tipo_participante']").attr('data-parsley-required', false)
                $('#viculo-select').hide();
            } else {
                $('#vinculo-ufma').prop('checked', true).change()
                $("[name='tipo_participante']").attr('data-parsley-required', true)
                $('#viculo-select').show();
            }

            console.log(vinculo_ufma);
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

    {!! Html::script('js/parsley.min.js') !!}

    {!! Html::script('bootstrap-toggle/bootstrap-toggle.min.js') !!}
@endsection
