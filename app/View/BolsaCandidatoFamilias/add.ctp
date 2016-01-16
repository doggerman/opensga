<div class="bolsaCandidatoFamilias form">
<?php echo $this->Form->create('BolsaCandidatoFamilia'); ?>
	<fieldset>
		<legend><?php echo __('Add Bolsa Candidato Familia'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('parentesco');
		echo $this->Form->input('idade');
		echo $this->Form->input('profissao');
		echo $this->Form->input('curso_instituicao');
		echo $this->Form->input('rendimento_mensal');
		echo $this->Form->input('bolsa_candidatura_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bolsa Candidato Familias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bolsa Candidaturas'), array('controller' => 'bolsa_candidaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bolsa Candidatura'), array('controller' => 'bolsa_candidaturas', 'action' => 'add')); ?> </li>
	</ul>
</div>
