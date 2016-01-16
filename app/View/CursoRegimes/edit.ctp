<div class="cursoRegimes form">
<?php echo $this->Form->create('CursoRegime'); ?>
	<fieldset>
		<legend><?php echo __('Edit Curso Regime'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('curso_id');
		echo $this->Form->input('regime_id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CursoRegime.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CursoRegime.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Curso Regimes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cursos'), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso'), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regimes'), array('controller' => 'regimes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Regime'), array('controller' => 'regimes', 'action' => 'add')); ?> </li>
	</ul>
</div>
