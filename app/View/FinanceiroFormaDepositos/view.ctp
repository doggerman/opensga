<div class="financeiroFormaDepositos view">
    <h2><?php echo __('Financeiro Forma Deposito'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($financeiroFormaDeposito['FinanceiroFormaDeposito']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($financeiroFormaDeposito['FinanceiroFormaDeposito']['name']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Financeiro Forma Deposito'),
                    ['action' => 'edit', $financeiroFormaDeposito['FinanceiroFormaDeposito']['id']]); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Financeiro Forma Deposito'),
                    ['action' => 'delete', $financeiroFormaDeposito['FinanceiroFormaDeposito']['id']], null,
                    __('Are you sure you want to delete # %s?',
                            $financeiroFormaDeposito['FinanceiroFormaDeposito']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Financeiro Forma Depositos'), ['action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Financeiro Forma Deposito'), ['action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(__('List Financeiro Depositos'),
                    ['controller' => 'financeiro_depositos', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Financeiro Deposito'),
                    ['controller' => 'financeiro_depositos', 'action' => 'add']); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Financeiro Depositos'); ?></h3>
    <?php if (!empty($financeiroFormaDeposito['FinanceiroDeposito'])): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Entidade Id'); ?></th>
                <th><?php echo __('Financeiro Conta Id'); ?></th>
                <th><?php echo __('Data Deposito'); ?></th>
                <th><?php echo __('Data Reconciliacao'); ?></th>
                <th><?php echo __('Financeiro Estado Deposito Id'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th><?php echo __('Created By'); ?></th>
                <th><?php echo __('Modified By'); ?></th>
                <th><?php echo __('Numero Comprovativo'); ?></th>
                <th><?php echo __('Financeiro Forma Deposito Id'); ?></th>
                <th><?php echo __('Financeiro Banco Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
                $i = 0;
                foreach ($financeiroFormaDeposito['FinanceiroDeposito'] as $financeiroDeposito): ?>
                    <tr>
                        <td><?php echo $financeiroDeposito['id']; ?></td>
                        <td><?php echo $financeiroDeposito['entidade_id']; ?></td>
                        <td><?php echo $financeiroDeposito['financeiro_conta_id']; ?></td>
                        <td><?php echo $financeiroDeposito['data_deposito']; ?></td>
                        <td><?php echo $financeiroDeposito['data_reconciliacao']; ?></td>
                        <td><?php echo $financeiroDeposito['financeiro_estado_deposito_id']; ?></td>
                        <td><?php echo $financeiroDeposito['created']; ?></td>
                        <td><?php echo $financeiroDeposito['modified']; ?></td>
                        <td><?php echo $financeiroDeposito['created_by']; ?></td>
                        <td><?php echo $financeiroDeposito['modified_by']; ?></td>
                        <td><?php echo $financeiroDeposito['numero_comprovativo']; ?></td>
                        <td><?php echo $financeiroDeposito['financeiro_forma_deposito_id']; ?></td>
                        <td><?php echo $financeiroDeposito['financeiro_banco_id']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), [
                                    'controller' => 'financeiro_depositos',
                                    'action'     => 'view',
                                    $financeiroDeposito['id'],
                            ]); ?>
                            <?php echo $this->Html->link(__('Edit'), [
                                    'controller' => 'financeiro_depositos',
                                    'action'     => 'edit',
                                    $financeiroDeposito['id'],
                            ]); ?>
                            <?php echo $this->Form->postLink(__('Delete'), [
                                    'controller' => 'financeiro_depositos',
                                    'action'     => 'delete',
                                    $financeiroDeposito['id'],
                            ], null, __('Are you sure you want to delete # %s?', $financeiroDeposito['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Financeiro Deposito'),
                        ['controller' => 'financeiro_depositos', 'action' => 'add']); ?> </li>
        </ul>
    </div>
</div>
