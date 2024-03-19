@extends('layouts.app')

@section('title', 'Comprovante de Avaliação')

@section('content')
	{{-- <div class="container"> --}}
		<div class="row vcenter">
			<div class="col-lg-offset-2 col-lg-6 col-md-10 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Comprovante de Avaliação</div>
					<div class="panel-body">
						@include('partials.messages')

						<div class="form-group row">
							<div class="col-md-12">
								<div class="form-group row center-block" style="margin-top: 10px;">
									<b>Chave</b>: {{ $key }}
								</div>
								@foreach($avaliacoes as $a)
									<label>{{ $a->pergunta }}: </label> {{ $a->resposta }} </br>
								@endforeach
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
								<a class="btn btn-block btn-success" href="{{ url('/') }}">Ok!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	{{-- </div> --}}
@endsection