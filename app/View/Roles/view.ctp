<div class="roles view">
    <h2><?php echo __('Role'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($role['Role']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($role['Role']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($role['Role']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($role['Role']['modified']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created By'); ?></dt>
        <dd>
            <?php echo h($role['Role']['created_by']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified By'); ?></dt>
        <dd>
            <?php echo h($role['Role']['modified_by']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Estado Objecto'); ?></dt>
        <dd>
            <?php echo $this->Html->link($role['EstadoObjecto']['name'],
                    ['controller' => 'estado_objectos', 'action' => 'view', $role['EstadoObjecto']['id']]); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Role'), ['action' => 'edit', $role['Role']['id']]); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role['Role']['id']],
                    ['confirm' => __('Are you sure you want to delete # %s?', $role['Role']['id'])]); ?> </li>
        <li><?php echo $this->Html->link(__('List Roles'), ['action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Role'), ['action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(__('List Estado Objectos'),
                    ['controller' => 'estado_objectos', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Estado Objecto'),
                    ['controller' => 'estado_objectos', 'action' => 'add']); ?> </li>
    </ul>
</div>
