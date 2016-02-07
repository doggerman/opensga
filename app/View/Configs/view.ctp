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

<div class="configs view">
    <h2><?php __('Config'); ?></h2>
    <dl><?php $i = 0;
            $class = ' class="altrow"'; ?>
        <dt<?php if ($i % 2 == 0) {
            echo $class;
        } ?>><?php echo __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) {
            echo $class;
        } ?>>
            <?php echo $config['Config']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) {
            echo $class;
        } ?>><?php echo __('Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) {
            echo $class;
        } ?>>
            <?php echo $config['Config']['name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) {
            echo $class;
        } ?>><?php echo __('Value'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) {
            echo $class;
        } ?>>
            <?php echo $config['Config']['value']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0) {
            echo $class;
        } ?>><?php echo __('Autoload'); ?></dt>
        <dd<?php if ($i++ % 2 == 0) {
            echo $class;
        } ?>>
            <?php echo $config['Config']['autoload']; ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Config', true),
                    ['action' => 'edit', $config['Config']['id']]); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Config', true), ['action' => 'delete', $config['Config']['id']],
                    null, sprintf(__('Are you sure you want to delete # %s?', true), $config['Config']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Configs', true), ['action' => 'index']); ?> </li>
        <li><?php echo $this->Html->link(__('New Config', true), ['action' => 'add']); ?> </li>
    </ul>
</div>
