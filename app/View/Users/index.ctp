<div class="actions" id="left-column">
    <h3><?php echo __('Detalhes Adicionais'); ?></h3>
    <br/>
    <?php echo $this->Html->link(sprintf(__('Lista de Usuario', true)), ['controller' => 'index', 'action' => 'index'],
            ['class' => 'linkselected']); ?>
    <?php echo $this->Html->link(sprintf(__('Novo Usuario', true)), ['action' => 'add'], ['class' => 'link']); ?>

</div>

<div class="projectos index" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Novo Usuario', true)), ['action' => 'add'], ['class' => 'button']); ?>
        <h1><?php echo __('Usuario'); ?></h1>
        <div class="breadcrumbs"><?php ?></div>
    </div>

    <div class="table">
        <table cellpadding="0" cellspacing="0" class="listing">
            <tr>
                <th><?php echo $this->Paginator->sort('Codigo', 'id'); ?></th>
                <th><?php echo $this->Paginator->sort('Usuario', 'username'); ?></th>

                <th> <?php echo $this->Paginator->sort('codigocartao'); ?> </th>
                <th class="actions"><?php echo __('Accoes'); ?></th>
            </tr>
            <?php
                $i = 0;
                foreach ($users as $user):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $user['User']['id']; ?>&nbsp;</td>
                        <td><?php echo $user['User']['username']; ?>&nbsp;</td>

                        <td><?php echo $user['User']['codigocartao']; ?>&nbsp;</td>
                        <td class="accoes">
                            <?php echo $this->Html->image("/img/login-icon.gif",
                                    ["alt" => "Brownies", 'url' => ['action' => 'view', $user['User']['id']]]); ?>
                            <?php echo $this->Html->image("/img/edit-icon.gif",
                                    ["alt" => "Brownies", 'url' => ['action' => 'edit', $user['User']['id']]]); ?>
                            <?php echo $this->Html->image("/img/hr.gif", [
                                    "alt" => "Brownies",
                                    'url' => ['action' => 'delete', $user['User']['id']],
                                    null,
                                    sprintf(__('Tem a certeza que deseja eliminar # %s?', true), $user['User']['id']),
                            ]); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
        </table>

    </div>
    <p>
        <?php
            //echo $this->Paginator->counter(array(
            //'format' => __('Page %page% of %pages%, Mostrando %current% linhas. Total: %count% linhas retornadas, starting on record %start%, ending on %end%', true)
            //));
        ?></p>

    <div class="paging">
        <?php echo $this->Paginator->prev('<<', [], null, ['class' => 'disabled']); ?>
        | <?php echo $this->Paginator->numbers(); ?>
        <?php echo $this->Paginator->next('>>', [], null, ['class' => 'disabled']); ?>
    </div>

</div>




















