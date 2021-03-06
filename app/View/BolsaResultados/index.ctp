<div class="bolsaResultados index">
    <h2><?php echo __('Bolsa Resultados'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('bolsa_candidatura_id'); ?></th>
            <th><?php echo $this->Paginator->sort('bolsa_tipo_bolsa_id'); ?></th>
            <th><?php echo $this->Paginator->sort('bolsa_motivo_indeferimento_id'); ?></th>
            <th><?php echo $this->Paginator->sort('data_resultado'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th><?php echo $this->Paginator->sort('created_by'); ?></th>
            <th><?php echo $this->Paginator->sort('modified_by'); ?></th>
            <th><?php echo $this->Paginator->sort('observacoes'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
            foreach ($bolsaResultados as $bolsaResultado): ?>
                <tr>
                    <td><?php echo h($bolsaResultado['BolsaResultado']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($bolsaResultado['BolsaPedido']['id'], [
                                'controller' => 'bolsa_candidaturas',
                                'action'     => 'view',
                                $bolsaResultado['BolsaPedido']['id'],
                        ]); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($bolsaResultado['BolsaTipoBolsa']['name'], [
                                'controller' => 'bolsa_tipo_bolsas',
                                'action'     => 'view',
                                $bolsaResultado['BolsaTipoBolsa']['id'],
                        ]); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($bolsaResultado['BolsaMotivoIndeferimento']['name'], [
                                'controller' => 'bolsa_motivo_indeferimentos',
                                'action'     => 'view',
                                $bolsaResultado['BolsaMotivoIndeferimento']['id'],
                        ]); ?>
                    </td>
                    <td><?php echo h($bolsaResultado['BolsaResultado']['data_resultado']); ?>&nbsp;</td>
                    <td><?php echo h($bolsaResultado['BolsaResultado']['created']); ?>&nbsp;</td>
                    <td><?php echo h($bolsaResultado['BolsaResultado']['modified']); ?>&nbsp;</td>
                    <td><?php echo h($bolsaResultado['BolsaResultado']['created_by']); ?>&nbsp;</td>
                    <td><?php echo h($bolsaResultado['BolsaResultado']['modified_by']); ?>&nbsp;</td>
                    <td><?php echo h($bolsaResultado['BolsaResultado']['observacoes']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'),
                                ['action' => 'view', $bolsaResultado['BolsaResultado']['id']]); ?>
                        <?php echo $this->Html->link(__('Edit'),
                                ['action' => 'edit', $bolsaResultado['BolsaResultado']['id']]); ?>
                        <?php echo $this->Form->postLink(__('Delete'),
                                ['action' => 'delete', $bolsaResultado['BolsaResultado']['id']], null,
                                __('Are you sure you want to delete # %s?',
                                        $bolsaResultado['BolsaResultado']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
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
        <li><?php echo $this->Html->link(__('New Bolsa Resultado'), ['action' => 'add']); ?></li>
        <li><?php echo $this->Html->link(__('List Bolsa Candidaturas'),
                    ['controller' => 'bolsa_candidaturas', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Bolsa Candidatura'),
                    ['controller' => 'bolsa_candidaturas', 'action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(__('List Bolsa Tipo Bolsas'),
                    ['controller' => 'bolsa_tipo_bolsas', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Bolsa Tipo Bolsa'),
                    ['controller' => 'bolsa_tipo_bolsas', 'action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(__('List Bolsa Motivo Indeferimentos'),
                    ['controller' => 'bolsa_motivo_indeferimentos', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Bolsa Motivo Indeferimento'),
                    ['controller' => 'bolsa_motivo_indeferimentos', 'action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(__('List Bolsa Bolsas'),
                    ['controller' => 'bolsa_bolsas', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Bolsa Bolsa'),
                    ['controller' => 'bolsa_bolsas', 'action' => 'add']); ?> </li>
    </ul>
</div>
