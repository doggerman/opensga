<div class="bolsaCandidaturas form">
<?php echo $this->Form->create('BolsaPedido'); ?>
	<fieldset>
		<legend><?php echo __('Add Bolsa Candidatura'); ?></legend>
	<?php
		echo $this->Form->input('aluno_id');
		echo $this->Form->input('ano_lectivo_id');
		echo $this->Form->input('bolsa_bolsa_id');
		echo $this->Form->input('estado_objecto_id');
		echo $this->Form->input('bolsa_tipo_bolsa_id');
		echo $this->Form->input('data_candidatura');
		echo $this->Form->input('entidade_id');
		echo $this->Form->input('bolsa_tipo_candidatura_id');
		echo $this->Form->input('nivel_estudante');
		echo $this->Form->input('tipo_bolsa_actual');
		echo $this->Form->input('observacoes');
		echo $this->Form->input('agregado_familiar');
		echo $this->Form->input('irmaos_estudantes');
		echo $this->Form->input('irmaos_trabalhadores');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bolsa Candidaturas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alunos'), array('controller' => 'alunos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aluno'), array('controller' => 'alunos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ano Lectivos'), array('controller' => 'ano_lectivos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ano Lectivo'), array('controller' => 'ano_lectivos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bolsa Bolsas'), array('controller' => 'bolsa_bolsas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bolsa Bolsa'), array('controller' => 'bolsa_bolsas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estado Objectos'), array('controller' => 'estado_objectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado Objecto'), array('controller' => 'estado_objectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bolsa Tipo Bolsas'), array('controller' => 'bolsa_tipo_bolsas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bolsa Tipo Bolsa'), array('controller' => 'bolsa_tipo_bolsas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entidades'), array('controller' => 'entidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entidade'), array('controller' => 'entidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bolsa Tipo Candidaturas'), array('controller' => 'bolsa_tipo_candidaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bolsa Tipo Candidatura'), array('controller' => 'bolsa_tipo_candidaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bolsa Resultados'), array('controller' => 'bolsa_resultados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bolsa Resultado'), array('controller' => 'bolsa_resultados', 'action' => 'add')); ?> </li>
	</ul>
</div>
