<div class="groups view">
    <h2><?php __('Group'); ?></h2>
    <dl><?php $i = 0;
            $class = ' class="altrow"'; ?>
        <dt<?php if ($i % 2 == 0) {
            echo $class;
        } ?>><?php echo __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) {
            echo $class;
        } ?>>
            <?php echo $group['Group']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) {
            echo $class;
        } ?>><?php echo __('Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) {
            echo $class;
        } ?>>
            <?php echo $group['Group']['name']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(sprintf(__('Edit %s', true), __('Group', true)),
                    ['action' => 'edit', $group['Group']['id']]); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('Delete %s', true), __('Group', true)),
                    ['action' => 'delete', $group['Group']['id']], null,
                    sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Groups', true)),
                    ['action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Group', true)), ['action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Users', true)),
                    ['controller' => 'users', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('New %s', true), __('User', true)),
                    ['controller' => 'users', 'action' => 'add']); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php printf(__('Related %s', true), __('Users', true)); ?></h3>
    <?php if (!empty($group['User'])): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Username'); ?></th>
                <th><?php echo __('Password'); ?></th>
                <th><?php echo __('Codigocartao'); ?></th>
                <th><?php echo __('Group Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
                $i = 0;
                foreach ($group['User'] as $user):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['codigocartao']; ?></td>
                        <td><?php echo $user['group_id']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View', true),
                                    ['controller' => 'users', 'action' => 'view', $user['id']]); ?>
                            <?php echo $this->Html->link(__('Edit', true),
                                    ['controller' => 'users', 'action' => 'edit', $user['id']]); ?>
                            <?php echo $this->Html->link(__('Delete', true),
                                    ['controller' => 'users', 'action' => 'delete', $user['id']], null,
                                    sprintf(__('Are you sure you want to delete # %s?', true), $user['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(sprintf(__('New %s', true), __('User', true)),
                        ['controller' => 'users', 'action' => 'add']); ?> </li>
        </ul>
    </div>
</div>
