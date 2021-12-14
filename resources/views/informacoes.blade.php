@extends('layouts.app')

@section('title', 'Visualizar Informações')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Confirme seus dados cadastrais</div>
                    </div>
                    <div class="panel-body dted-font">
                        @include('partials.messages')

                        <div class="form-group row">
                            <div class='col-md-6'>
                                @include('partials.pessoa.view')
                            </div>
                            <div class='col-md-6'>
                                @include('partials.profGeral.view')
                            </div>
                            {{-- <div class='col-md-4'>
                                @include('partials.profSaude.view')
                            </div> --}}
                        </div>
                        <div class="form-group " style="clear: both;">
                            @if ($pessoa->email != null && $pessoa->cpf != null && $cbo != null)
                                {{-- {!! Html::linkRoute('pessoa.edit', 'Editar Informações', [$pessoa->id], ['class' => 'btn dted-search-button-submit center-block']) !!} --}}
                            @elseif($pessoa->email == NULL)
                                <div class="btn-danger" style="padding: 10px; margin-bottom: 10px;">
                                    Não encontramos seu e-mail! <br />
                                    Nossos certificados são enviados para seu correio eletrônico. <br />
                                    Por favor, edite suas informações.
                                </div>
                            @elseif($pessoa->cpf == NULL)
                                <div class="btn-danger" style="padding: 10px; margin-bottom: 10px;">
                                    Não encontramos seu CPF! <br />
                                    Nossos registros são enviados como relatório para o Ministério da Saúde. <br />
                                    Seu CPF é importante para validação das informações. <br />
                                    Por favor, edite seus dados pessoais.
                                </div>
                            @elseif($cbo == NULL)
                                <div class="btn-danger" style="padding: 10px; margin-bottom: 10px;">
                                    Não encontramos sua Profissão! <br />
                                    Nossos registros são enviados como relatório para o Ministério da Saúde. <br />
                                    Sua Profissão é importante para elaboração de novas atividades. <br />
                                    Por favor, edite seus dados de profissão.
                                </div>
                            @endif
                        </div>
                        {{ Form::open(['route' => 'registrar']) }}
                        @if (Session::has('atividade'))
                            {{ Form::submit('Avançar', ['class' => 'btn dted-search-button-submit center-block']) }}
                        @endif
                        {{ Form::close() }}
                    </div>
                </div>
                @if ($pessoa->email != null && $pessoa->cpf != null && $cbo != null)
                <div class="dted-search-link">
                    {!! Html::linkRoute('pessoa.edit', 'Edite seus dados cadastrais', [$pessoa->id], ['class' => 'pull-left']) !!}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
