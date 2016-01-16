<?php
/**
 * OpenSGA - Sistema de Gestão Académica
 *   Copyright (C) 2010-2011  INFOmoz (Informática-Moçambique)
 *
 *
 * @copyright     Copyright 2010-2011, INFOmoz (Informática-Moçambique) (http://infomoz.net)
 * * @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.5.0.0

 *
 */
?>


<div class="container_12">
    <div class="grid_12">
        <div class="block-border">
            <div class="block-content">
                <ul class="shortcut-list">

                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="grid_6">
        <div class="block-border">
            <div class="block-header">
                <h1><?php echo __('Dados do Curso')?></h1><span></span>
            </div>
            <?php echo $this->Form->create('User', array('class' => 'block-content form', 'inputDefaults' => array('before' => '<p>', 'after' => '</p>'))); ?>
            <?php echo $this->Form->input('novasenha1', array('type'=>'password','label' => __('Nova Senha'), 'div' => '_100', 'class' => 'text')); ?>
            <?php echo $this->Form->input('novasenha2', array('type'=>'password','label' => __('Repetir Nova Senha'), 'div' => '_100', 'class' => 'required')); ?>
            
            
        <div class="clear"></div>
        <div class="block-actions">
            <ul class="actions-left">
                <li><?php echo $this->Html->link(__('Voltar ao Painel Inicial'), '/', array('class' => 'button red')) ?></li>
            </ul>
            <ul class="actions-right">
                <li><?php echo $this->Form->end(array('label' => __('GRAVAR', true), 'class' => 'button')); ?> </li>
            </ul>
        </div>
        </form>
    </div>
</div>
<div class="clear height-fix"></div>

</div><!--! end of #main-content -->


