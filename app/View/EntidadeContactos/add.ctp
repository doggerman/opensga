<div class="entidadeContactos form">
<?php echo $this->Form->create('EntidadeContacto'); ?>
	<fieldset>
		<legend><?php echo __('Add Entidade Contacto'); ?></legend>
	<?php
		echo $this->Form->input('entidade_id');
		echo $this->Form->input('tipo_contacto_id');
		echo $this->Form->input('valor');
		echo $this->Form->input('estado_objecto_id');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Entidade Contactos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Entidades'), array('controller' => 'entidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entidade'), array('controller' => 'entidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Contactos'), array('controller' => 'tipo_contactos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Contacto'), array('controller' => 'tipo_contactos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estado Objectos'), array('controller' => 'estado_objectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado Objecto'), array('controller' => 'estado_objectos', 'action' => 'add')); ?> </li>
	</ul>
</div>
