<div class="tg0013EstadoEntidades form">
<?php echo $this->Form->create('Tg0013EstadoEntidade');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Tg0013EstadoEntidade', true)); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Tg0013EstadoEntidades', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('funcionarios', true)), array('controller' => 'funcionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Funcionario', true)), array('controller' => 'funcionarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Alunos', true)), array('controller' => 'Alunos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Aluno', true)), array('controller' => 'Alunos', 'action' => 'add')); ?> </li>
	</ul>
</div>