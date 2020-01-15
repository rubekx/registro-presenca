@extends('layouts.app')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

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
                <div class="panel-heading">Editar Profissão</div>

                <div class="panel-body">
                    {{ Form::model($profGeral, ['route' => ['profGeral.update', $profGeral->id], 'method' => 'PUT', 'data-parsley-validate' => '']) }}
                        <div class="form-group row">
                            <div class='col-md-2' style='margin-top: 5px; text-align: right;'>
                                <label for="cbo">CBO:</label>
                            </div>
                            <div class='col-md-10'>
                                {{ Form::select('cbo', $cbos, null, array('class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Por favor, selecione sua Profissão ...', 'data-parsley-required' => 'true')) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-2'  style='margin-top: 5px; text-align: right;'>
                                <label for="estado">Estado:</label>
                            </div>
                            <div class='col-md-5'>
                               {{ Form::select('estado', $estados, $currEstado, array('class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Por favor, selecione seu estado ...', 'data-parsley-required' => 'true')) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-2'  style='margin-top: 5px; text-align: right;'>
                                <label for="municipio">Município:</label>
                            </div>
                            <div class='col-md-5'>
                                {{ Form::select('municipio', $arrayMun, null, array('class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Por favor, selecione seu estado ...', 'data-parsley-required' => 'true')) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4'></div>
                            <div class='col-md-4'>
                                {{ Form::submit('Salvar', array('class' => 'btn btn-primary btn-block')) }}
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
        $('select[name=estado]').ready(function () {
            $.get('/get-municipios/' + {{$currEstado}}, function (municipios) {
                $('select[name=municipio]').empty();
                $.each(municipios, function (key, value) {
                    $('select[name=municipio]').append('<option value=' + value.ibge + '>' + value.nome + '</option>');
                });
                 $('select[name=municipio]').selectpicker('refresh');
            });
        });

        $('select[name=estado]').change(function () {
            var idEstado = $(this).val();
            $.get('/get-municipios/' + idEstado, function (municipios) {
                $('select[name=municipio]').empty();
                $.each(municipios, function (key, value) {
                    $('select[name=municipio]').append('<option value=' + value.ibge + '>' + value.nome + '</option>');
                });
                 $('select[name=municipio]').selectpicker('refresh');
            });
        });
    </script>

    {!! Html::script("js/parsley.min.js") !!}


@endsection