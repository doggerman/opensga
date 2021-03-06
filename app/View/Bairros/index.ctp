<div class="bairros index">
    <h2><?php echo __('Bairros'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($bairros as $bairro): ?>
            <tr>
                <td><?php echo h($bairro['Bairro']['id']); ?>&nbsp;</td>
                <td><?php echo h($bairro['Bairro']['name']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($bairro['Cidade']['name'],
                            ['controller' => 'cidades', 'action' => 'view', $bairro['Cidade']['id']]); ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), ['action' => 'view', $bairro['Bairro']['id']]); ?>
                    <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $bairro['Bairro']['id']]); ?>
                    <?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $bairro['Bairro']['id']], [],
                            __('Are you sure you want to delete # %s?', $bairro['Bairro']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
            echo $this->Paginator->counter([
                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'),
            ]);
        ?>    </p>
    <div class="paging">
        <?php
            echo $this->Paginator->prev('< ' . __('previous'), [], null, ['class' => 'prev disabled']);
            echo $this->Paginator->numbers(['separator' => '']);
            echo $this->Paginator->next(__('next') . ' >', [], null, ['class' => 'next disabled']);
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Bairro'), ['action' => 'add']); ?></li>
        <li><?php echo $this->Html->link(__('List Cidades'), ['controller' => 'cidades', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Cidade'), ['controller' => 'cidades', 'action' => 'add']); ?> </li>
    </ul>
</div>
