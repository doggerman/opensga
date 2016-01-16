<div class="regimeEstudos index">
	<h2><?php echo __('Regime Estudos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($regimeEstudos as $regimeEstudo): ?>
	<tr>
		<td><?php echo h($regimeEstudo['RegimeEstudo']['id']); ?>&nbsp;</td>
		<td><?php echo h($regimeEstudo['RegimeEstudo']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $regimeEstudo['RegimeEstudo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $regimeEstudo['RegimeEstudo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $regimeEstudo['RegimeEstudo']['id']), null, __('Are you sure you want to delete # %s?', $regimeEstudo['RegimeEstudo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Regime Estudo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Candidato Graduacaos'), array('controller' => 'candidato_graduacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidato Graduacao'), array('controller' => 'candidato_graduacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
