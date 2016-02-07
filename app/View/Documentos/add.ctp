<?php //include('menu.ctp'); ?>

<div class="projectos form" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Lista de DocumentoIdentificacaos', true)), ['action' => 'index'],
                ['class' => 'button']); ?>
        <h1><?php echo __('DocumentoIdentificacao - adicionar'); ?></h1>
        <div class="breadcrumbs"><?php echo $this->Html->getCrumbs(' > ', 'Home'); ?></div>
    </div>
    <div class="table">


        <?php echo $this->Form->create('DocumentoIdentificacao'); ?>
        <table class="listingform" cellpadding="0" cellspacing="0">
            <tr>
                <th class="full" colspan="2">Carregamento de documento</th>
            </tr>
            <tr>
                <?php
                    echo $this->Form->input('name', [
                            'label'   => 'Nome',
                            'before'  => '<tr><td>',
                            'between' => '</td><td>',
                            'after'   => '</td></tr>',
                            'div'     => false,
                    ]);
                ?>
            </tr>

            <tr>
                <td></td>
                <td><?php echo $this->Form->end(__('GRAVAR', true)); ?></td>
            </tr>
        </table>
    </div>
</div>
