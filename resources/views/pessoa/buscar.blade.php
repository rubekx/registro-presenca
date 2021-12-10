@extends('layouts.app')
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
                    <div class="panel-heading"><div class="dted-search-h1">Editar dados pessoais</div></div>
                    <div class="panel-body dted-font">
                        {{ Form::open(['route' => 'info']) }}
                        <div class="form-group">
                            <div class='col-md-4' style='margin-top: 5px; text-align: right;'>
                                {{ Form::label('searchTaghomeForm', 'Procure por CPF/EMAIL:') }}
                            </div>
                            <div class='col-md-4'>
                                {{ Form::text('searchTaghomeForm', null, ['class' => 'form-control', 'placeholder' => 'CPF ou EMAIL', 'autocomplete' => 'off','required']) }}
                            </div>
                            <div class='col-md-4'>
                                {{ Form::submit('Procurar', ['class' => 'btn dted-search-button-submit']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
