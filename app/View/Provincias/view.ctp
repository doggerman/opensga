<?php //include('menu.ctp'); ?>

<div class="projectos form" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Lista de Provincias', true)), ['action' => 'index'],
                ['class' => 'button']); ?>
        <h1><?php echo __('Provincia - visualizar'); ?></h1>

    </div>
    <div class="table">

        <?php
            echo $this->Form->create('Provincia'); ?>
        <table class="listingform" cellpadding="0" cellspacing="0">
            <th class="full" colspan="2">Dados da Provincia</th>
            <?php
                echo $this->Form->input('codigo', [
                        'disabled' => 'true',
                        'label'    => 'Codigo',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'div'      => false,
                ]);
                echo $this->Form->input('name', [
                        'disabled' => 'true',
                        'label'    => 'Nome',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'div'      => false,
                ]);
                echo $this->Form->input('Paise_id', [
                        'disabled' => 'true',
                        'label'    => 'Pais',
                        'before'   => '<tr><td>',
                        'between'  => '</td><td>',
                        'after'    => '</td></tr>',
                        'div'      => false,
                ]);
            ?>
            </tr>
        </table>
    </div>
</div>