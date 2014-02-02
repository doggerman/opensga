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
 
 
class RegimeLectivosController extends AppController {

	var $name = 'RegimeLectivos';

	function index() {
		$this->RegimeLectivo->recursive = 0;
		$this->set('RegimeLectivos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid RegimeLectivo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('RegimeLectivo', $this->RegimeLectivo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RegimeLectivo->create();
			if ($this->RegimeLectivo->save($this->data)) {
				$this->Session->setFlash(__('The RegimeLectivo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The RegimeLectivo could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid RegimeLectivo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RegimeLectivo->save($this->data)) {
				$this->Session->setFlash(__('The RegimeLectivo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The RegimeLectivo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RegimeLectivo->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for RegimeLectivo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RegimeLectivo->delete($id)) {
			$this->Session->setFlash(__('RegimeLectivo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('RegimeLectivo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
