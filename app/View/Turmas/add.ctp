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
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0

 * 
 */
 ?>
 
 
 
 <div  class="box box-100">
	<div class="boxin">
		<div class="header">
			<h3><?php echo __('Editar dados da Turma')?></h3>
			<a href="#" class="button"><?php echo __('Lista de Turmas')?>&nbsp;»</a>
		</div>
		<?php echo $this->Form->create('Turma',array('class'=>'fields'));?>
		<fieldset>
			<legend><?php echo __('Detalhes da Turma')?></legend>
			<table>
				<tr>
				<td width="49%">
					<table>
						<tr>
							<td>
								<label>
									Nome da Turma: 
									<span class="hotspot" onmouseover="tooltip.show('Nome do Curso a Adicionar');" onmouseout="tooltip.hide();">?</span
								</label>
								<span class="input_wrapper blank">
									<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'txt','size'=>45));?>
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<label>Ano Lectivo:</label>
								<span class="input_wrapper blank">
									<?php  echo $this->Form->input('ano_lectivo_id',array('label'=>false,'div'=>false));?>
								<span class="input_wrapper blank">
							</td>
						</tr>
						<tr>
							<td>
								<label>Curso:</label>
									<span class="input_wrapper blank">
										<?php  echo $this->Form->input('curso_id',array('label'=>false,'div'=>false));?>
									</span>
							</td>
						</tr>
						<tr>
							<td>
								<label>Plano de Estudos:</label>
									<span class="input_wrapper blank">
										<?php  echo $this->Form->input('plano_estudo_id',array('label'=>false,'div'=>false));?>
									</span>
							</td>
						</tr>																		
					</table>
					</td>
					<td width="49%">
							<table>
							<tr>
								<td>
									<label>
										Ano Curricular: 
										<span class="hotspot" onmouseover="tooltip.show('Nome do Curso a Adicionar');" onmouseout="tooltip.hide();">?</span
									</label>
									<span class="input_wrapper blank">
										<?php echo $this->Form->input('ano_curricular',array('label'=>false,'div'=>false,'class'=>'txt','size'=>45));?>
									</span>
								</td>
							</tr>
							<tr>
								<td>
									<label>Semestre Curricular:</label>
									<span class="input_wrapper blank">
										<?php  echo $this->Form->input('semestre_curricular',array('label'=>false,'div'=>false));?>
									<span class="input_wrapper blank">
								</td>
							</tr>
							<tr>
								<td>
									<label>Turno:</label>
										<span class="input_wrapper blank">
											<?php  echo $this->Form->input('turno',array('label'=>false,'div'=>false));?>
										</span>
								</td>
							</tr>
							<tr>
								<td>
									<label>Numero Máximo de Alunos:</label>
										<span class="input_wrapper blank">
											<?php  echo $this->Form->input('nummaximo',array('label'=>false,'div'=>false));?>
										</span>
								</td>
							</tr>																		
						</table>						
					</td>
				</tr>
			</table>	
		</fieldset>
		<fieldset>
			<legend><?php echo __('Detalhes de Docencia')?></legend>
			<table>
				<tr>
				<td width="49%">
					<table>
						<tr>
							<td>
								<label>
									Nome do Docente: 
									<span class="hotspot" onmouseover="tooltip.show('Nome do Curso a Adicionar');" onmouseout="tooltip.hide();">?</span
								</label>
								<span class="input_wrapper blank">
									<?php echo $this->Form->input('funcionario_id',array('label'=>false,'div'=>false));?>
								</span>
							</td>
						</tr>														
					</table>
					</td>
					<td width="49%">
					<table width="100%">
						<tr>
							<td>
								<label>Nome do Assistente:</label>
								<span class="input_wrapper blank">
									<?php  echo $this->Form->input('funcionario_ass_id',array('label'=>false,'div'=>false));?>
								<span class="input_wrapper blank">
							</td>
						</tr>															
					</table>					
					</td>
				</tr>
			</table>	
		</fieldset>	
		<fieldset>
			<legend><?php echo __('Outros Detalhes')?></legend>
			<table>
				<tr>
				<td width="49%">
					<table>
						<tr>
							<td>
								<label>
									Estado da Turma: 
									<span class="hotspot" onmouseover="tooltip.show('Nome do Curso a Adicionar');" onmouseout="tooltip.hide();">?</span
								</label>
								<span class="input_wrapper blank">
									<?php echo $this->Form->input('estado',array('label'=>false,'div'=>false));?>
								</span>
							</td>
						</tr>														
					</table>
					</td>
					<td width="49%">
					<table width="100%">
						<tr>
							<td>
							</td>
						</tr>															
					</table>					
					</td>
				</tr>
			</table>	
		</fieldset>				
        <table class="listingform" cellpadding="0" cellspacing="0">
    <tr><td></td><td><?php echo $this->Form->end(__('GRAVAR', true),array('class'=>'button'));?></td></tr>
        </table>
	</div>
</div>
