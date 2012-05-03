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
 * @link          http://infomoz.net/opensga CakePHP(tm) Project
 * @author		  Elisio Leonardo (http://infomoz.net/elisio-leonardo)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0
 * @license       GNU Affero General Public License
 * 
 */
 
 
 
class Pagamento extends AppModel {
	var $name = 'Pagamento';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'aluno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Conta' => array(
			'className' => 'Conta',
			'foreignKey' => 'conta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipopagamento' => array(
			'className' => 'Tipopagamento',
			'foreignKey' => 'tipopagamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Anolectivo' => array(
			'className' => 'Anolectivo',
			'foreignKey' => 'anolectivo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estadopagamento' => array(
			'className' => 'Estadopagamento',
			'foreignKey' => 'estadopagamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)				
	);
	
	/**
	 * Gera todos os pagamentos de todos os alunos matriculados
	 * Nao duplica pagamentos para o mesmo plano de estudos
	 */
	function gerarPagamentos($anolectivo_id,$aluno_id=null,$num_semestre=1){
			
		$this->Tipopagamento->recursive = -1;
		
		
		debug($num_semestre);
		if($num_semestre==1){
			$tipos = array(1,2,3,4,5,6,7);
		}
		else{
			$tipos = array(1,2,8,9,10,11,12);	
		}
        die(debug($tipos));
		$tipopagamentos = $this->Tipopagamento->find('all',array('conditions'=>array('Tipopagamento.id'=>$tipos)));
		if($aluno_id!=null){
			$this->Aluno->Matricula->recursive = 0;	
			$alunos = $this->Aluno->Matricula->find('all',array('conditions'=>array('Matricula.aluno_id'=>$aluno_id,'Matricula.anolectivo_id'=>$anolectivo_id)));
		}
		else{
			$alunos = $this->Aluno->Matricula->getAllAlunosMatriculados($anolectivo_id);			
		}
			
		
		
		foreach($alunos as $aluno){
			$aluno_id = $aluno['Matricula']['aluno_id'];
			
			foreach($tipopagamentos as $tp){
					
				$pagamento=array();
				$pagamento['aluno_id'] = $aluno_id;
				$pagamento['valor'] = $tp['Tipopagamento']['valor'];
				$pagamento['tipopagamento_id'] = $tp['Tipopagamento']['id'];
				$pagamento['anolectivo_id'] = $anolectivo_id;
				if($tp['Tipopagamento']['mes_limite']!=null){
					$data_limite = date('Y')."-".$tp['Tipopagamento']['mes_limite']."-".$tp['Tipopagamento']['dia_limite'];
					$pagamento['data_limite'] = $data_limite;
				}
				
				/**
				 * @Todo o digito numerico aqui deve ser automatizado antes do proximo semestre :-)
				 * FIXME O digito numerico deve ser mudado antes do proximo semestre :-)
				 */
				$codigo_pagamento = $aluno['Aluno']['codigo'].$tp['Tipopagamento']['codigo']."01";
				
				$pagamento['codigo'] = $codigo_pagamento;
				$pagamento['estadopagamento_id']=1;
				$pagamentos = array('Pagamento'=>$pagamento);
				
				if(!$this->evitaDuplicados($pagamento)){
					$this->create();
					$this->save($pagamentos);
					
				}
					
				}
				
				
			}

			
		}
		
		

	function evitaDuplicados($pagamento){
		$this->recursive=-1;	
		$pagamento = $this->find('first',array('conditions'=>array('Pagamento.aluno_id'=>$pagamento['aluno_id'],'anolectivo_id'=>$pagamento['anolectivo_id'],'tipopagamento_id'=>$pagamento['tipopagamento_id'])));
		
		return $pagamento;
	}
}
