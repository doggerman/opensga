<div class="sadeAvaliadors index">
	<h2><?php echo __('Sade Avaliadors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('entidade_id');?></th>
			<th><?php echo $this->Paginator->sort('docente_id');?></th>
			<th><?php echo $this->Paginator->sort('nivel_avaliador_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($sadeAvaliadors as $sadeAvaliador): ?>
	<tr>
		<td><?php echo h($sadeAvaliador['SadeAvaliador']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sadeAvaliador['Entidade']['name'], array('controller' => 'entidades', 'action' => 'view', $sadeAvaliador['Entidade']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadeAvaliador['Docente']['name'], array('controller' => 'docentes', 'action' => 'view', $sadeAvaliador['Docente']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadeAvaliador['NivelAvaliador']['name'], array('controller' => 'nivel_avaliadors', 'action' => 'view', $sadeAvaliador['NivelAvaliador']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sadeAvaliador['SadeAvaliador']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sadeAvaliador['SadeAvaliador']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sadeAvaliador['SadeAvaliador']['id']), null, __('Are you sure you want to delete # %s?', $sadeAvaliador['SadeAvaliador']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sade Avaliador'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Entidades'), array('controller' => 'entidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entidade'), array('controller' => 'entidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Docentes'), array('controller' => 'docentes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Docente'), array('controller' => 'docentes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Nivel Avaliadors'), array('controller' => 'nivel_avaliadors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nivel Avaliador'), array('controller' => 'nivel_avaliadors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sade Avaliacao Qualitativas'), array('controller' => 'sade_avaliacao_qualitativas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sade Avaliacao Qualitativa'), array('controller' => 'sade_avaliacao_qualitativas', 'action' => 'add')); ?> </li>
	</ul>
</div>
