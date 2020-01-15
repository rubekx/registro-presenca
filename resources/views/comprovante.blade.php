@extends('layouts.app')

@section('title', 'Comprovante de Presença')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">Comprovante de Presença</div>
						<div class="panel-body">
							<h2 style="margin: 20px auto; text-align: center; width: 400px; color: green;">Presença confirmada!</h2>
							@include('partials.messages')

								<div class="form-group row">
									<div class="col-md-6">
										{{-- <input type="text" readonly="readonly" name="pessoa" id="pessoa" value="{{ $pessoa }}" class="form-control" /> --}}
										<span style="font-weight: bolder;">{{ $pessoa }}</span> declara presente na atividade, cujo tema é {{ $atividade }}.
										<div class="form-group row center-block" style="margin-top: 10px;">
											<b>Chave</b>: {{ $key }}
										</div>
									</div>
									<div class="col-md-3">
									</div>
									<div class="col-md-3">
										<div class="form-group row">
											Local: {{ $local }}
										</div>
										<div class="form-group row">
											Endereço IP: {{ $ip }}
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
										<a class="btn btn-block btn-success" href="{{ url('/logout') }}"
							                    onclick="event.preventDefault();
							                         document.getElementById('logout-form').submit();">
							                    Ok
							                  </a>
									</div>
								</div>

								{{-- {{ $aux }} --}}

								{{-- @if(isset($ubs))
								<div class="form-group row">
									<div class="col-md-8">
										<label for="ip">trabalha em:</label>
										<input type="text" readonly="readonly" name="ubs" id="ubs" value="{{ $ubs }}" class="form-control" />
									</div>
								</div>
								@endif

							<div class="form-group">
								<div class="form-group row">
									<div class="col-md-4">
										<label for="ip">confirma presença pelo IP:</label>
										<input type="text" readonly="readonly" name="ip" id="ip" value="{{ $ip }}" class="form-control" />
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-4">
										<label for="ip">de:</label>
										<input type="text" readonly="readonly" name="local" id="local" value="{{ $local }}" class="form-control" />
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-10">
										<label for="ip">para atividade:</label>
										<input type="text" readonly="readonly" name="atividade" id="atividade" value="{{ $atividade }}" class="form-control" />
									</div>
								</div>
							</div> --}}
						</div>
					</div>
			</div>
		</div>
	</div>
@endsection