	<div style='margin-left: 10px;'>
		<div class="form-group">
			<strong>Dados de Vínculo</strong>
		</div>
		<div class="form-group">
			<strong>CNS:</strong>
			{{ isset($profSaude) ? $profSaude->cns : 'Não Cadastrado' }}
		</div>
		<div class="form-group">
			<strong>Unidade de Trabalho:</strong>
			{{ isset($ubs) ? $ubs->nome : 'Não Cadastrado' }}
		</div>
	</div>
