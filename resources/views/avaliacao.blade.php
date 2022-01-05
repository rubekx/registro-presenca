@extends('layouts.app')

@section('stylesheets')
	<!-- FANCY CHECK BOX CSS -->
    <link href="{{ asset('css/fancy_checkbox.css') }}" rel="stylesheet">
@endsection

@section('title', 'Formulário de Avaliação')

@section('content')
	{{-- <div class="container"> --}}
		<div class="row vcenter">
			<div class="col-lg-offset-2 col-lg-6 col-md-10 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Formulário de Avaliação</div>
					<div class="panel-body">
						@include('partials.messages')

    						{!! Form::open(['route' => 'persist_avaliacao','class'=>'form-horizontal', 'method'=>'post', 'id'=>'avaliacao_form']) !!}

    						{!! Form::hidden('key',  $key) !!}
    						{!! Form::hidden('tipoAval',  $tipoAval) !!}


						@if($isValid)
	    						<div class="form-group row">
								<div class="col-md-12">
									<b>Tema:</b>: {{ $atv->tema }}
								</div>
							</div>
	    						<div class="form-group row">
								<div class="col-md-12">
									<b>Data:</b>: {{ $atv->dt }}
								</div>
							</div>

							<hr>
						@endif

						@foreach($perguntasAval as $p)
							<div class="form-group row">
								<div class='col-md-8' style='margin: 5px; text-align: left;'>
									<label>{{ $p->descricao }}</label>
									@if($p->tipo_input == "textarea")
										{{ Form::textarea($p->descricaoId, null, array('id' => $p->descricaoId, 'class' => 'form-control textarea-form', 'data-parsley-required' => 'true', "data-parsley-length"=>"[2, 512]" )) }}
									@elseif($p->tipo_input == "radio")
										<div class="stars">
											<input type="radio" name="{{ $p->descricaoId }}" class="star-1" id="{{ $p->descricaoId }}star-1" value="1" />
											<label class="star-1" for="{{ $p->descricaoId }}star-1">1</label>
											<input type="radio" name="{{ $p->descricaoId }}" class="star-2" id="{{ $p->descricaoId }}star-2" value="2"  />
											<label class="star-2" for="{{ $p->descricaoId }}star-2">2</label>
											<input type="radio" name="{{ $p->descricaoId }}" class="star-3" id="{{ $p->descricaoId }}star-3" value="3"  />
											<label class="star-3" for="{{ $p->descricaoId }}star-3">3</label>
											<input type="radio" name="{{ $p->descricaoId }}" class="star-4" id="{{ $p->descricaoId }}star-4" value="4"  />
											<label class="star-4" for="{{ $p->descricaoId }}star-4">4</label>
											<input type="radio" name="{{ $p->descricaoId }}" class="star-5" id="{{ $p->descricaoId }}star-5" value="5"  />
											<label class="star-5" for="{{ $p->descricaoId }}star-5">5</label>
											<span></span>
										</div>
									@endif
								</div>
							</div>
						@endforeach

						@foreach($perguntasGerais as $p)
							<div class="form-group row">
								<div class='col-md-8' style='margin: 5px; text-align: left;'>
									<label>{{ $p->descricao }}</label>
									@if($p->tipo_input == "textarea")
										{{ Form::textarea($p->descricaoId, null, array('class' => 'form-control textarea-form', 'data-parsley-required' => 'true', "data-parsley-length"=>"[2, 512]" )) }}
									@elseif($p->tipo_input == "radio")
										<div class="stars">
											<input type="radio" name="{{ $p->descricaoId }}" class="star-1" id="{{ $p->descricaoId }}star-1" value="1" />
											<label class="star-1" for="{{ $p->descricaoId }}star-1">1</label>
											<input type="radio" name="{{ $p->descricaoId }}" class="star-2" id="{{ $p->descricaoId }}star-2" value="2"  />
											<label class="star-2" for="{{ $p->descricaoId }}star-2">2</label>
											<input type="radio" name="{{ $p->descricaoId }}" class="star-3" id="{{ $p->descricaoId }}star-3" value="3"  />
											<label class="star-3" for="{{ $p->descricaoId }}star-3">3</label>
											<input type="radio" name="{{ $p->descricaoId }}" class="star-4" id="{{ $p->descricaoId }}star-4" value="4"  />
											<label class="star-4" for="{{ $p->descricaoId }}star-4">4</label>
											<input type="radio" name="{{ $p->descricaoId }}" class="star-5" id="{{ $p->descricaoId }}star-5" value="5"  />
											<label class="star-5" for="{{ $p->descricaoId }}star-5">5</label>
											<span></span>
										</div>
									@endif
								</div>
							</div>
						@endforeach

						@if($isValid)

							<hr>

							<div class="form-group row">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									{!! Form::submit('Enviar', ['class' => 'btn btn-block btn-success']); !!}
								</div>
							</div>
						@else
							<div class="form-group row">
								<div class="col-md-8">
									<div class="form-group row center-block" style="margin: 10px;">
										{{ $msg }}
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<a class="btn btn-block btn-success" href="{{ url('/') }}">Ok!</a>
								</div>
							</div>
						@endif

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	{{-- </div> --}}
@endsection