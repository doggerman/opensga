<?php $grupo = $this->Session->read('Auth.User.group_id'); ?>

<?php
    /* ---------------------------------------------------------- */
    /* OP??O : Pedagogica                                         */
    /* menu lateral, incluir em todos os files                    */
    /* 2010.10.16  RA                    (c)2010 Cofimatica, Lda  */
    /* ---------------------------------------------------------- */


?>

<div class="actions" id="left-column">

    <h3><?php echo __('Detalhes Adicionais'); ?></h3>
    <br/>
    <?php if ($grupo == 1 || $grupo == 2) {
        echo $this->Html->link(sprintf(__('Funcionarios', true)), ['action' => 'index'], ['class' => 'linkselected']);
    } ?>
    <?php if ($grupo == 1 || $grupo == 2) {
        echo $this->Html->link(sprintf(__('Alertas', true)), ['controller' => 'tg0017messages', 'action' => 'index'],
                ['class' => 'link']);
    } ?>
    <?php if ($grupo == 1 || $grupo == 2) {
        echo $this->Html->link(sprintf(__('Parametrizacao >>', true)),
                ['controller' => 'Grauacademicos', 'action' => 'index'], ['class' => 'link']);
    } ?>

</div>
