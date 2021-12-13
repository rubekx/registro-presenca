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