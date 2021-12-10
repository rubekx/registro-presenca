  <div style='margin-left: 10px;'>
    <div class="form-group">
      <strong>Dados pessoais</strong>
    </div>
    <div class="form-group">
      <strong>Pessoa:</strong> {{ $pessoa->nome }}
    </div>
    <div class="form-group">
      <strong>Sobrenome:</strong> {{ $pessoa->sobrenome }}
    </div>
    <div class="form-group">
      <strong>CPF:</strong>
      @if($pessoa->cpf!=NULL)
        {{ $pessoa->cpf }}
      @else
          <span style="color: red; font-size: 18px; text-decoration: underline;">xxx.xxx.xxx-xx</span>
      @endif
    </div>
    <div class="form-group">
      <strong>Email:</strong>
      @if($pessoa->email!=NULL)
          {{ $pessoa->email }}
      @else
          <span style="color: red; font-size: 18px; text-decoration: underline;">xxxxx@xxx.xxx</span>
      @endif
    </div>
    <div class="form-group">
      <strong>Celular:</strong> {{ $pessoa->celular }}
    </div>
    <div class="form-group">
      <strong>Sexo:</strong> {{ $pessoa->sexo }}
    </div>
  </div>

  {{-- {{ Form::open(array('route' => null)) }}
    {{ Form::hidden('idPessoa', $pessoa->id) }}
    {{ Form::submit('Editar Informações', array('class' => 'btn btn-success')) }}
  {{ Form::close() }} --}}

{{--
  {!! Html::linkRoute('pessoa.edit', 'Editar Informações', array($pessoa->id), array('class' => 'btn btn-success btn-block')) !!} --}}

