@extends('layouts.app')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('title', 'Finalizar Informações')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{ Form::open(['route' => 'persist', 'data-parsley-validate' => '']) }}
                <div class="panel panel-default">
                    <div class="panel-heading dted-search-h1">Informe de onde você está acessando</div>
                    <div class="panel-body dted-font">
                        @include('partials.messages')

                        <div class="form-group">
                            <div class="form-group row" style='padding-botton:100px'>
                                <div class='col-md-2' style='margin-top: 5px; text-align: right;'>
                                    <label for="ip">IP:</label>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" readonly="readonly" name="ip" id="ip" value="{{ $ip }}"
                                        class="form-control" data-parsley-required='true' />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class='col-md-2' style='margin-top: 5px; text-align: right;'>
                                    <label for="estado">Estado:</label>
                                </div>
                                <div class='col-md-5'>
                                    {{ Form::select('estado', $estados, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'data-live-search-normalize' => 'true', 'title' => 'Por favor, selecione seu estado ...', 'data-parsley-required' => 'true']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class='col-md-2' style='margin-top: 5px; text-align: right;'>
                                    <label for="municipio">Município:</label>
                                </div>
                                <div class='col-md-5'>
                                    <select name="municipio" id="municipio" class="form-control selectpicker"
                                        data-live-search="true" data-live-search-normalize='true'
                                        title="Selecione sua cidade ..." data-parsley-required='true'>
                                        {{-- @foreach ($municipios as $municipio)
                                                                  <option value="{{ $municipio->ibge }}">{{ $municipio->nome }}</option>
                                                              @endforeach --}}
                                    </select>
                                </div>
                            </div>
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
