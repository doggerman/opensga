<div class="smsNotifications form">
    <?php echo $this->Form->create('SmsNotification'); ?>
    <fieldset>
        <legend><?php echo __('Edit Sms Notification'); ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('phone_number');
            echo $this->Form->input('message');
            echo $this->Form->input('status');
            echo $this->Form->input('sms_notification_type_id');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'),
                    ['action' => 'delete', $this->Form->value('SmsNotification.id')], null,
                    __('Are you sure you want to delete # %s?', $this->Form->value('SmsNotification.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Sms Notifications'), ['action' => 'index']); ?></li>
        <li><?php echo $this->Html->link(__('List Sms Notification Types'),
                    ['controller' => 'sms_notification_types', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Sms Notification Type'),
                    ['controller' => 'sms_notification_types', 'action' => 'add']); ?> </li>
    </ul>
</div>
