<div class="docenteCategorias index">
    <h2><?php echo __('Docente Categorias'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
            $i = 0;
            foreach ($docenteCategorias as $docenteCategoria):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $docenteCategoria['DocenteCategoria']['id']; ?>&nbsp;</td>
                    <td><?php echo $docenteCategoria['DocenteCategoria']['name']; ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View', true),
                                ['action' => 'view', $docenteCategoria['DocenteCategoria']['id']]); ?>
                        <?php echo $this->Html->link(__('Edit', true),
                                ['action' => 'edit', $docenteCategoria['DocenteCategoria']['id']]); ?>
                        <?php echo $this->Html->link(__('Delete', true),
                                ['action' => 'delete', $docenteCategoria['DocenteCategoria']['id']], null,
                                sprintf(__('Are you sure you want to delete # %s?', true),
                                        $docenteCategoria['DocenteCategoria']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
    <p>
        <?php
            echo $this->Paginator->counter([
                    'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%',
                            true),
            ]);
        ?>    </p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), [], null, ['class' => 'disabled']); ?>
        | <?php echo $this->Paginator->numbers(); ?>
        |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', [], null, ['class' => 'disabled']); ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Docente Categoria', true), ['action' => 'add']); ?></li>
        <li><?php echo $this->Html->link(__('List Docentes', true),
                    ['controller' => 'docentes', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Docente', true),
                    ['controller' => 'docentes', 'action' => 'add']); ?> </li>
    </ul>
</div>