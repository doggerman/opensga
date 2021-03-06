<div class="artigoCategorias form">
    <?php echo $this->Form->create('ArtigoCategoria'); ?>
    <fieldset>
        <legend><?php echo __('Edit Artigo Categoria'); ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('name');
            echo $this->Form->input('created_by');
            echo $this->Form->input('modified_by');
            echo $this->Form->input('estado_objecto_id');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'),
                    ['action' => 'delete', $this->Form->value('ArtigoCategoria.id')], [
                            'confirm' => __('Are you sure you want to delete # %s?',
                                    $this->Form->value('ArtigoCategoria.id')),
                    ]); ?></li>
        <li><?php echo $this->Html->link(__('List Artigo Categorias'), ['action' => 'index']); ?></li>
        <li><?php echo $this->Html->link(__('List Estado Objectos'),
                    ['controller' => 'estado_objectos', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Estado Objecto'),
                    ['controller' => 'estado_objectos', 'action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(__('List Artigo Categoria Artigos'),
                    ['controller' => 'artigo_categoria_artigos', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Artigo Categoria Artigo'),
                    ['controller' => 'artigo_categoria_artigos', 'action' => 'add']); ?> </li>
    </ul>
</div>
