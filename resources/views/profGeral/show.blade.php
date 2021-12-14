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
                <div class="panel-heading">Cadastrar Profissão</div>

                <div class="panel-body">
                        <div class="form-group row">
                            <div class='col-md-2' style='margin-top: 5px; text-align: right;'>
                                <label for="cbo">CBO:</label>
                            </div>
                            <div class='col-md-10'>
                                {{ $profGeral->cbo }} - {{ $cbo->nome }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-2'  style='margin-top: 5px; text-align: right;'>
                                <label for="municipio">Município:</label>
                            </div>
                            <div class='col-md-4'>
                                {{ $profGeral->municipio }} - {{ $mun->nome }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class='col-md-4'></div>
                            <div class='col-md-2'>
                                {!! Html::linkRoute('profGeral.edit', 'Editar', array($profGeral->id), array('class' => 'btn dted-search-button-submit btn-block')) !!}
                            </div>
                            <div class='col-md-2'>
                                {!! Html::linkRoute('registrar', 'Avançar', null, array('class' => 'btn dted-search-button-submit btn-block')) !!}
                            </div>
                            <div class='col-md-4'></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('post-script')
    <script type="text/javascript">
        $('select[name=estado]').change(function () {
            var idEstado = $(this).val();
            $.get('/get-municipios/' + idEstado, function (municipios) {
                $('select[name=municipio]').empty();
                $('select[name=municipio]').append('<option value=0>...</option>');
                $.each(municipios, function (key, value) {
                    $('select[name=municipio]').append('<option value=' + value.ibge + '>' + value.nome + '</option>');
                });
            });
        });
    </script>

    {!! Html::script("js/parsley.min.js") !!}

@endsection