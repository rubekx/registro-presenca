@extends('layouts.app')
@section('content')
    <div class="container h-50 transform-center-parent">
        <div class="row transform-center">
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
                        <div class="dted-search-h1">Editar dados pessoais</div>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'info']) }}
                        <div class="form-group row dted-font">
                            <div class='col-md-4' style='margin-top: 5px;'>
                                {{ Form::label('searchTaghomeForm', 'Procure por CPF/EMAIL:') }}
                            </div>
                            <div class='col-md-6' style='margin-top: 5px;'>
                                {{ Form::text('searchTaghomeForm', null, ['class' => 'form-control', 'placeholder' => 'CPF ou EMAIL', 'autocomplete' => 'off', 'required']) }}
                            </div>
                            <div class='col-md-1' style='margin-top: 5px;'>
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
