<?php
    /**
     * @FIXME Colocar o nome do utilizador aqui
     *
     */
?>
<div class="actions" id="left-column">
    <h3><?php echo __('Detalhes Adicionais'); ?></h3>
    <br/>
    <?php echo $this->Html->link(__('Lista de Usuarios', true), ['action' => 'index'], ['class' => 'link']); ?>
    <?php echo $this->Html->link(sprintf(__('Novo Usuario', true)), ['action' => 'add'],
            ['class' => 'linkselected']); ?>

</div>

<div class="projectos form" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Lista de Usuarios', true)), ['action' => 'index'],
                ['class' => 'button']); ?>
        <h1><?php echo __('Novo Usuario'); ?></h1>
        <div class="breadcrumbs"><?php echo $this->Html->getCrumbs(' > ', 'Home'); ?></div>
    </div>
    <div class="table">


        <?php echo $this->Form->create('User'); ?>
        <table class="listingform" cellpadding="0" cellspacing="0">
            <tr>
                <th class="full" colspan="2">Carregamento de Novo Usuario</th>
            </tr>
            <tr>
                <?php
                    echo $this->Form->input('username', [
                            'label'   => 'Usuario',
                            'before'  => '<tr><td>',
                            'between' => '</td><td>',
                            'after'   => '</td></tr>',
                            'div'     => false,
                    ]);
                    echo $this->Form->input('password', [
                            'label'   => 'Password',
                            'before'  => '<tr><td>',
                            'between' => '</td><td>',
                            'after'   => '</td></tr>',
                            'div'     => false,
                    ]);
                    echo $this->Form->input('codigocartao', [
                            'label'   => 'Codigo do Cartao',
                            'before'  => '<tr><td>',
                            'between' => '</td><td>',
                            'after'   => '</td></tr>',
                            'div'     => false,
                    ]);
                    echo $this->Form->input('group_id', [
                            'label'   => 'Grupo',
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
