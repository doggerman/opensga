<div class="artigoTags form">
<?php echo $this->Form->create('ArtigoTag'); ?>
	<fieldset>
		<legend><?php echo __('Edit Artigo Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('estado_objecto_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ArtigoTag.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('ArtigoTag.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Artigo Tags'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Estado Objectos'), array('controller' => 'estado_objectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado Objecto'), array('controller' => 'estado_objectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artigo Tag Artigos'), array('controller' => 'artigo_tag_artigos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artigo Tag Artigo'), array('controller' => 'artigo_tag_artigos', 'action' => 'add')); ?> </li>
	</ul>
</div>