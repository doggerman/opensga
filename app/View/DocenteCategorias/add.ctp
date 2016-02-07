<div class="docenteCategorias form">
    <?php echo $this->Form->create('DocenteCategoria'); ?>
    <fieldset>
        <legend><?php echo __('Add Docente Categoria'); ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Docente Categorias', true), ['action' => 'index']); ?></li>
        <li><?php echo $this->Html->link(__('List Docentes', true),
                    ['controller' => 'docentes', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Docente', true),
                    ['controller' => 'docentes', 'action' => 'add']); ?> </li>
    </ul>
</div>