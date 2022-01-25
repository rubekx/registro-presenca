@extends('layouts.app')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('title', 'Finalizar Informações')
@section('content')
    {{-- <div class="container h-50 transform-center-parent"> --}}
    <div class="row vcenter">
        <div class="col-lg-offset-2 col-lg-6 col-md-10 col-xs-12">
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
                                    <label for="tipo_participante">Vínculo</label>
                                </div>
                                <div class='col-md-8'>
                                    {{ Form::select('tipo_participante', $tipoParticipante, $profGeral->tipo_participante, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'data-live-search-normalize' => 'true', 'data-size' => '5', 'title' => 'Por favor, selecione seu vínculo ...', 'data-parsley-required' => 'true']) }}
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
    {{-- </div> --}}
@endsection
@section('post-script')

    <script type="text/javascript">
        $(function() {
            let ultimaPresenca = "{{ $ultimaPresenca }}";
            if (ultimaPresenca !== "") {
                ultimaPresenca = JSON.parse(ultimaPresenca.replace(/&quot;/g, '"'));
                let uf = ultimaPresenca.uf;
                let ibge = ultimaPresenca.ibge;
                $("select[name=estado] option[value='" + uf + "']").attr("selected", "selected");
                $.get('/get-municipios/' + uf, function(municipios) {
                    $('select[name=municipio]').empty();
                    let selected = '';
                    $.each(municipios, function(key, value) {
                        selected = value.ibge == ibge ? 'selected' : ''
                        $('select[name=municipio]').append('<option ' + selected + ' value=' + value.ibge + '>' + value.nome + '</option>');
                    });
                    $('select[name=municipio]').selectpicker('refresh');
                });
            }
        });

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
