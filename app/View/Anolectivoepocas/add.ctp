<?php
    /**
     * OpenSGA - Sistema de Gest�o Acad�mica
     *   Copyright (C) 2010-2011  INFOmoz (Inform�tica-Mo�ambique)
     *
     * Este programa � um software livre: Voc� pode redistribuir e/ou modificar
     * todo ou parte deste programa, desde que siga os termos da licen�a por nele
     * estabelecidos. Grande parte do c�digo deste programa est� sob a licen�a
     * GNU Affero General Public License publicada pela Free Software Foundation.
     * A vers�o original desta licen�a est� dispon�vel na pasta raiz deste software.
     *
     * Este software � distribuido sob a perspectiva de que possa ser �til para
     * satisfazer as necessidades dos seus utilizadores, mas SEM NENHUMA GARANTIA. Veja
     * os termos da licen�a GNU Affero General Public License para mais detalhes
     *
     * As redistribui��es deste software, mesmo quando o c�digo-fonte for modificado significativamente,
     * devem manter est� informa��o legal, assim como a licen�a original do software.
     *
     * @copyright     Copyright 2010-2011, INFOmoz (Inform�tica-Mo�ambique) (http://infomoz.net)
     ** @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
     * @author          Elisio Leonardo (elisio.leonardo@gmail.com)
     * @package       opensga
     * @subpackage    opensga.core.controller
     * @since         OpenSGA v 0.10.0.0
     *
     */
?>
<div class="anolectivoepocas form">
    <?php echo $this->Form->create('T0017anolectivoepoca'); ?>
    <fieldset>
        <legend><?php printf(__('Add %s', true), __('T0017anolectivoepoca', true)); ?></legend>
        <?php
            echo $this->Form->input('t0009anolectivo_id');
            echo $this->Form->input('EpocaAvaliacao_id');
            echo $this->Form->input('limite');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(sprintf(__('List %s', true), __('T0017anolectivoepocas', true)),
                    ['action' => 'index']); ?></li>
        <li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Anolectivos', true)),
                    ['controller' => 't0009anolectivos', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('New %s', true), __('AnoLectivo', true)),
                    ['controller' => 't0009anolectivos', 'action' => 'add']); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('List %s', true), __('EpocaAvaliacaos', true)),
                    ['controller' => 'EpocaAvaliacaos', 'action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(sprintf(__('New %s', true), __('EpocaAvaliacao', true)),
                    ['controller' => 'EpocaAvaliacaos', 'action' => 'add']); ?> </li>
    </ul>
</div>