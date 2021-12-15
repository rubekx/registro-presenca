@extends('layouts.app')

@section('title', 'Comprovante de Presença')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default dted-font">
                    <div class="panel-heading">
                        <div class="dted-search-h1">Comprovante de Presença</div>
                    </div>
                    <div class="panel-body dted-font">
                        <h2 style="margin: 20px auto; text-align: center; width: 400px; color: #27AE60;">
                            <b>Presença confirmada!</b>
                        </h2>
                        @include('partials.messages')

                        <div class="form-group">
                            <div class="col-md-12"  style="margin-top: 10px;">
                                {{ $pessoa }} declara presente na atividade, cujo tema é {{ $atividade }}.
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12"  style="margin-top: 10px;">
                                Local: {{ $local }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"  style="margin-top: 10px;">
                                Endereço IP: {{ $ip }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"  style="margin-top: 10px;">
                                <b>Chave</b>: {{ $key }}
                            </div>
                        </div>
                        <div class="form-group row center-block" style="margin-top: 10px;">
                            
                        </div>
                        <div class="form-group text-center">
                            <button class="btn dted-search-button-submit" id="fechar-comprovante">
                                Voltar ao início
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('post-script')
    <script type="text/javascript">
        document.getElementById("fechar-comprovante").onclick = function() {
            location.href = "{{ route('logout') }}";
        };
    </script>
@endsection
