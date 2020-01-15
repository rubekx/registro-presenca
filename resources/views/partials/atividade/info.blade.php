<hr/>
  <div style='margin-left: 10px;'>
    <div class="form-group">
      <strong>Dados da atividade</strong>
    </div>
    <div class="form-group">
      <strong>ID:</strong> {{ $atividade->id }}
    </div>
    <div class="form-group">
      <strong>Data:</strong> {{ $atividade->dt }}
    </div>
    <div class="form-group">
      <strong>Horário:</strong> de {{ $atividade->hr_inicio }} às {{ $atividade->hr_termino }}
    </div>
    <div class="form-group">
      <strong>Tema:</strong> {{ $atividade->tema }}
    </div>
    <div class="form-group">
      <strong>Modalidade/Tipo:</strong> {{ $modalidade->descricao }} - {{ $tipo->descricao }}
    </div>
  </div>
<hr/>