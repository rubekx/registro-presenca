	<div style='margin-left: 10px;'>
		<div class="form-group">
			<strong>Dados de Profissão</strong>
		</div>
		<div class="form-group">
			<strong>Cbo:</strong>
			{!! isset($cbo) ? $cbo->nome : '<span style="color: red;">Não Cadastrado</span>' !!}
		</div>
		<div class="form-group">
			<strong>Residência:</strong>
			{!! (isset($resMun) && isset($resEst)) ? $resMun->nome . '/' . $resEst->descricao : 'Não Cadastrado' !!}
		</div>
	</div>

{{-- 	{{ Form::open(array('route' => null)) }}
		{{ Form::hidden('idPessoa', $pessoa->id) }}
		{{
			isset($profGeral) ?
			Form::submit('Editar Profissão', array('class' => 'btn btn-success')) :
			Form::submit('Criar Profissão', array('class' => 'btn btn-danger'))
		}}
	{{ Form::close() }} --}}

{{-- 	{{
		isset($profGeral) ?
		Html::linkRoute('profGeral.edit', 'Editar Profissão', array($pessoa->id), array('class' => 'btn btn-success btn-block')) :
		Html::linkRoute('profGeral.create', 'Cadastrar Profissão', array($pessoa->id), array('class' => 'btn btn-danger btn-block'))
	}} --}}
