@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buscar Atividade</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/home') }}">
                        {{ csrf_field() }}

                        <div class="form-group"> {{-- {{ $errors->has('email') ? ' has-error' : '' }}"> --}}
                            <label for="idAtividade" class="col-md-4 control-label">Identificador da Atividade</label>

                            <div class="col-md-6">
                                {{-- <input id="idAtividade" type="idAtividade" class="form-control" name="idAtividade" autocomplete="off" required aured autofocus> --}}


                                @if($atividades!=NULL)

                                    {{ Form::select('idAtividade', $atividades, null, array('class' => 'form-control selectpicker', 'data-live-search' => 'true', 'title' => 'Por favor, selecione a Atividade ...', 'data-parsley-required' => 'true')) }}
                                    
                                @else
                                    <input type="text" value="Nenhuma atividade aberta no momento..." readonly="true" class="form-control" />
                                @endif

                                @if (isset($msg))
                                    <span class="help-block">
                                        <strong>{{ $msg }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Avançar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

