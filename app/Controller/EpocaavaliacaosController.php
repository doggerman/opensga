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
 
 
 
class EpocaavaliacaosController extends AppController {

	var $name = 'Epocaavaliacaos';

	function index() {
		$this->Epocaavaliacao->recursive = 0;
		$this->set('epocaavaliacaos', $this->paginate());
	}

	function view($id = null) 
	{       //App::Import('Model','Logmv');
	        //$logmv = new Logmv;
		if (!$id) {
			$this->Session->setFlash('Invalido %s', 'flasherror');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('epocaavaliacao', $this->Epocaavaliacao->read(null, $id));
                if (empty($this->data)) 
				{
			$this->data = $this->Epocaavaliacao->read(null, $id);
			//$logmv->logview(14,$this->Session->read('Auth.User.id'),$id,$this->data["Epocaavaliacao"]["name"]);
		
		        }
	}

	function add() {
	        //App::Import('Model','Logmv');
	        //$logmv = new Logmv;
		if (!empty($this->data)) {
			$this->Epocaavaliacao->create();
			if ($this->Epocaavaliacao->save($this->data)) {
			//$logmv->logInsert(14,$this->Session->read('Auth.User.id'),$this->Epocaavaliacao->getLastInsertID(),$this->data["Epocaavaliacao"]["name"]);
				$this->Session->setFlash('** Dados Cadastrados com Sucesso **','flashok');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao gravar dados. Por favor tente de novo.','flasherror');}
		}
	}

	function edit($id = null) {
	  //App::Import('Model','Logmv');
	        //$logmv = new Logmv;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalido %s', 'flasherror');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Epocaavaliacao->save($this->data)) {
			 //$logmv->logUpdate(14,$this->Session->read('Auth.User.id'),$id,$this->data["Epocaavaliacao"]["name"]);
				
				$this->Session->setFlash('Dado Editados com sucesso','flashok');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao editar dados. Por favor tente de novo.','flasherror');}
		}
		if (empty($this->data)) {
			$this->data = $this->Epocaavaliacao->read(null, $id);
		}
	}

	function delete($id = null) {
	        //App::Import('Model','Logmv');
	        //$logmv = new Logmv;
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'epocaavaliacao'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Epocaavaliacao->delete($id)) {
		//$logmv->logDelete(14,$this->Session->read('Auth.User.id'),$id,'Delete Epoca de Avaliacao');
			$this->Session->setFlash('Dados deletedos com sucesso ','flashok');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Epocaavaliacao'));
		$this->redirect(array('action' => 'index'));
	}
        function beforeRender(){
            $this->set('current_section','avaliacao');
        }
}
?>