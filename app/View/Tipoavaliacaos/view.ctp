<?php //include('menu.ctp'); ?>

<div class="projectos form" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Lista de Tipo de Avaliacoes', true)), ['action' => 'index'],
                ['class' => 'button']); ?>
        <h1><?php echo __('Tipo de Avaliacao - Visualizar'); ?></h1>

    </div>
    <div class="table">

        <?php
            //O
            echo $this->Form->create('TipoAvaliacao'); ?>
        <table class="listingform" cellpadding="0" cellspacing="0">
            <tr>
                <th class="full" colspan="2">Tipo de Avaliacao</th>
            </tr>
            <tr>
                <?php
                    echo $this->Form->input('name', [
                            'disabled' => 'true',
                            'label'    => 'Nome',
                            'before'   => '<tr><td>',
                            'between'  => '</td><td>',
                            'after'    => '</td></tr>',
                            'div'      => false,
                            'size'     => '45',
                    ]);
                    echo $this->Form->input('EpocaAvaliacao_id', [
                            'disabled' => 'true',
                            'label'    => 'Epoca de Avaliacao',
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