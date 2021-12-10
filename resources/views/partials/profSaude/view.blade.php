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

{{-- 	{{ Form::open(array('route' => null)) }}
		{{ Form::hidden('idPessoa', $pessoa->id) }}
		{{
			isset($profSaude) ?
			Form::submit('Editar Vínculo', array('class' => 'btn btn-success')) :
			Form::submit('Cadastrar Vínculo', array('class' => 'btn btn-danger'))
		}}
	{{ Form::close() }} --}}

