<div class="bolsaTipoBolsas form">
<?php echo $this->Form->create('BolsaTipoBolsa'); ?>
	<fieldset>
		<legend><?php echo __('Add Bolsa Tipo Bolsa'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('valor_bolsa');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bolsa Tipo Bolsas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bolsa Candidaturas'), array('controller' => 'bolsa_candidaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bolsa Candidatura'), array('controller' => 'bolsa_candidaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bolsa Resultados'), array('controller' => 'bolsa_resultados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bolsa Resultado'), array('controller' => 'bolsa_resultados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bolsa Valor Bolsas'), array('controller' => 'bolsa_valor_bolsas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bolsa Valor Bolsa'), array('controller' => 'bolsa_valor_bolsas', 'action' => 'add')); ?> </li>
	</ul>
</div>
