<?php //include('menu.ctp'); ?>

<div class="projectos form" id="center-column">
      <div class="top-bar">
        <?php echo $this->Html->link(sprintf(__('Lista de Turnos', true)), array('action' => 'index'),array('class'=>'button')); ?>
	<h1><?php echo __('Turno - visualizar');?></h1>

    </div>
    <div class="table">

<?php
    echo $this->Form->create('Turno');?>
        <table class="listingform" cellpadding="0" cellspacing="0">
	<th class="full" colspan="2">Dados do Turno</th>
        <?php
         echo $this->Form->input('name',array('disabled'=>'true','label'=>'Nome','before'=>'<tr><td>','between'=>'</td><td>','after'=>'</td></tr>','div'=>false));
        ?>
        </table>
</div>
</div>