<div class="planoestudoanos form">
    <?php echo $this->Form->create('DisciplinaPlanoEstudo'); ?>
    <fieldset>
        <legend><?php printf(__('Edit %s', true), __('DisciplinaPlanoEstudo', true)); ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('ano');
            echo $this->Form->input('semestre');
            echo $this->Form->input('grupodisciplina');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Delete', true),
                    ['action' => 'delete', $this->Form->value('DisciplinaPlanoEstudo.id')], null,
                    sprintf(__('Are you sure you want to delete # %s?', true),
                            $this->Form->value('DisciplinaPlanoEstudo.id'))); ?></li>
        <li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Planoestudoanos', true)),
                    ['action' => 'index']); ?></li>
    </ul>
</div>