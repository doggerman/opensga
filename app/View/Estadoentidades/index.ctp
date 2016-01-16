<div class="tg0013EstadoEntidades index">
	<h2><?php echo __('Tg0013EstadoEntidades');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tg0013EstadoEntidades as $tg0013EstadoEntidade):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tg0013EstadoEntidade['Tg0013EstadoEntidade']['id']; ?>&nbsp;</td>
		<td><?php echo $tg0013EstadoEntidade['Tg0013EstadoEntidade']['name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $tg0013EstadoEntidade['Tg0013EstadoEntidade']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $tg0013EstadoEntidade['Tg0013EstadoEntidade']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $tg0013EstadoEntidade['Tg0013EstadoEntidade']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tg0013EstadoEntidade['Tg0013EstadoEntidade']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, Mostrando %current% linhas. Total: %count% linhas retornadas, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Tg0013EstadoEntidade', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('funcionarios', true)), array('controller' => 'funcionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Funcionario', true)), array('controller' => 'funcionarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Alunos', true)), array('controller' => 'Alunos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Aluno', true)), array('controller' => 'Alunos', 'action' => 'add')); ?> </li>
	</ul>
</div>