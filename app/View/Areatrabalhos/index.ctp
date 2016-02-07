<?php
    /**
     * OpenSGA - Sistema de Gestão Académica
     *   Copyright (C) 2010-2011  INFOmoz (Informática-Moçambique)
     *
     * Este programa é um software livre: Você pode redistribuir e/ou modificar
     * todo ou parte deste programa, desde que siga os termos da licença por nele
     * estabelecidos. Grande parte do código deste programa está sob a licença
     * GNU Affero General Public License publicada pela Free Software Foundation.
     * A versão original desta licença está disponível na pasta raiz deste software.
     *
     * Este software é distribuido sob a perspectiva de que possa ser útil para
     * satisfazer as necessidades dos seus utilizadores, mas SEM NENHUMA GARANTIA. Veja
     * os termos da licença GNU Affero General Public License para mais detalhes
     *
     * As redistribuições deste software, mesmo quando o código-fonte for modificado significativamente,
     * devem manter está informação legal, assim como a licença original do software.
     *
     * @copyright     Copyright 2010-2011, INFOmoz (Informática-Moçambique) (http://infomoz.net)
     ** @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
     * @author          Elisio Leonardo (elisio.leonardo@gmail.com)
     * @package       opensga
     * @subpackage    opensga.core.controller
     * @since         OpenSGA v 0.10.0.0
     *
     */
?>
<?php //include('menu.ctp'); ?>

<div class="projectos index" id="center-column">
    <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Nova Area de Trabalho', true)), ['action' => 'add'],
                ['class' => 'button']); ?>
        <h1><?php echo __('Areas de Trabalho'); ?></h1>

    </div>

    <div class="table">
        <table cellpadding="0" cellspacing="0" class="listing">
            <tr>
                <th><?php echo $this->Paginator->sort('Id', 'id'); ?></th>
                <th><?php echo $this->Paginator->sort('Nome', 'name'); ?></th>
                <th class="actions"><?php echo __('AcÃ§Ãµes'); ?></th>
            </tr>
            <?php
                $i = 0;
                foreach ($tg0010areatrabalhos as $tg0010areatrabalho):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                    ?>
                    <tr<?php echo $class; ?>>
                        <td><?php echo $tg0010areatrabalho['Tg0010areatrabalho']['id']; ?>&nbsp;</td>
                        <td><?php echo $tg0010areatrabalho['Tg0010areatrabalho']['name']; ?>&nbsp;</td>
                        <td class="accoes">
                            <?php echo $this->Html->image("/img/login-icon.gif", [
                                    "alt"   => "Brownies",
                                    "title" => "Visualizar",
                                    'url'   => ['action' => 'view', $tg0010areatrabalho['Tg0010areatrabalho']['id']],
                            ]); ?>
                            <?php echo $this->Html->image("/img/edit-icon.gif", [
                                    "alt"   => "Brownies",
                                    "title" => "Editar",
                                    'url'   => ['action' => 'edit', $tg0010areatrabalho['Tg0010areatrabalho']['id']],
                            ]); ?>
                            <?php echo $this->Html->image("/img/hr.gif", [
                                    "alt"   => "Brownies",
                                    "title" => "Eliminar",
                                    'url'   => ['action' => 'delete', $tg0010areatrabalho['Tg0010areatrabalho']['id']],
                                    null,
                                    sprintf(__('Are you sure you want to delete # %s?', true),
                                            $tg0010areatrabalho['Tg0010areatrabalho']['id']),
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
