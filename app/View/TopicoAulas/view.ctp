<div class="topicoAulas view">
    <h2><?php echo __('Topico Aula'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($topicoAula['TopicoAula']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Aula'); ?></dt>
        <dd>
            <?php echo $this->Html->link($topicoAula['Aula']['id'],
                    ['controller' => 'aulas', 'action' => 'view', $topicoAula['Aula']['id']]); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Topico'); ?></dt>
        <dd>
            <?php echo h($topicoAula['TopicoAula']['topico']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Topico Aula'),
                    ['action' => 'edit', $topicoAula['TopicoAula']['id']]); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Topico Aula'),
                    ['action' => 'delete', $topicoAula['TopicoAula']['id']], [
                            'confirm' => __('Are you sure you want to delete # %s?', $topicoAula['TopicoAula']['id']),
                    ]); ?> </li>
        <li><?php echo $this->Html->link(__('List Topico Aulas'), ['action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Topico Aula'), ['action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(__('List Aulas'), ['controller' => 'aulas', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Aula'), ['controller' => 'aulas', 'action' => 'add']); ?> </li>
    </ul>
</div>
