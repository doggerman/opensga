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
<div class="actions" id="left-column">
    <h3><?php echo __('Detalhes Adicionais'); ?></h3>
    <br/>
    <?php echo $this->Html->link(sprintf(__('Avaliacao', true)),
            ['controller' => 'avaliacaos', 'action' => 'registo_de_notas'], ['class' => 'link']); ?>
    <?php echo $this->Html->link(sprintf(__('Tipo de Avaliacoes', true)),
            ['controller' => 'tipoavaliacaos', 'action' => 'index'], ['class' => 'link']); ?>
    <?php echo $this->Html->link(sprintf(__('Épocas de Avaliação', true)),
            ['controller' => 'EpocaAvaliacaos', 'action' => 'index'], ['class' => 'link']); ?>
    <?php echo $this->Html->link(sprintf(__('Tempo Limite', true)),
            ['controller' => 'anolectivoepocas', 'action' => 'index'], ['class' => 'linkselected']); ?>
    <?php //echo $this->Html->link(sprintf(__('Registo de Notas', true)), array('controller' => 'avaliacaos', 'action' => 'registo_de_notas'),array('class'=>'link')); ?>
</div>