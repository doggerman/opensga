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
 
 
class CursosController extends AppController {

	var $name = 'Cursos';
	

	function index() {
		$this->Curso->recursive = 0;
		$this->set('cursos', $this->paginate());
		
                
	}

	function view($id = null) 
	{
	    //App::Import('Model','Logmv');
	    //$logmv = new Logmv;
		if (!$id) {
			$this->Session->setFlash('Curso Invalido','flasherror');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cursos', $this->Curso->read(null, $id));
		if (empty($this->data)) 
		{
		
		$this->data = $this->Curso->read(null, $id);
		//$this->data["Curso"]["id"]["name"]
			//var_dump($this->data);
		//$logmv->logview(3,$this->Session->read('Auth.User.id'),$this->data["Curso"]["id"],$this->data["Curso"]["name"]);
		
		}
		
		$grauacademicos = $this->Curso->Grauacademico->find('list');
		$tipocursos = $this->Curso->Tipocurso->find('list');
        $escolas = $this->Curso->Escola->find('list');
		$this->set(compact('grauacademicos', 'tipocursos','escolas'));
	}

	function add() 
	{
	
		if (!empty($this->data)) {
		
			$this->Curso->create();
			if ($this->Curso->save($this->data)) {
				$this->Session->setFlash('** Dados Cadastrados com Sucesso **','flashok');
				
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao gravar dados. Por favor tente de novo.','flasherror');
			}
		}
		$escolas = $this->Curso->Escola->find('list');
		$grauacademicos = $this->Curso->Grauacademico->find('list');
		$tipocursos = $this->Curso->Tipocurso->find('list');
		$this->set(compact('grauacademicos', 'tipocursos','escolas'));
	}

	function edit($id = null) {
	
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalido %s', 'flasherror');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {

			if ($this->Curso->save($this->data)) {
				$this->Session->setFlash('Dados modificados com sucesso.','flashok');
				//$logmv->logUpdate(3,$this->Session->read('Auth.User.id'),$id,$this->data["Curso"]["name"]);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao editar dados. Por favor tente de novo.','flasherror');}
		}
                $this->set('cursos', $this->Curso->read(null, $id));
		if (empty($this->data)) {
			$this->data = $this->Curso->read(null, $id);
		}
        $escolas = $this->Curso->Escola->find('list');
		$grauacademicos = $this->Curso->Grauacademico->find('list');
		$tipocursos = $this->Curso->Tipocurso->find('list');
		$this->set(compact('Grauacademicos', 'tg0007tipocursos','tg0016escolas'));
	}

	function delete($id = null) {
	//App::Import('Model','Logmv');
	//$logmv = new Logmv;
	//$logmv->logDelete(3,$this->Session->read('Auth.User.id'),$id,$this->data["Curso"]["name"]);
		if (!$id) {
			$this->Session->setFlash('Codigo Invalido para este curso','flasherror');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Curso->delete($id)) {
	    $this->Session->setFlash('Dados deletedos com sucesso ','flashok');
			
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Curso nao eliminado.Por favor, tente novamente','flasherror');
		$this->redirect(array('action' => 'index'));
	}

        function beforeRender(){
            parent::beforeRender();
            $this->set('current_section','pedagogica');
        }
		   function pdf_index(){
		   //App::Import('Model','Logmv');
	       //$logmv = new Logmv;
		   //$logmv->logviw_pdf(3,$this->Session->read('Auth.User.id'));
		 
           Configure::write('debug',0); // Otherwise we cannot use this method while developing
            
            //$membros = $this->Membro->find('all');
           $cursos = $this->Curso->find('all',array('order'=> array ('Curso.name ASC')));
           $listas = array();
           foreach( $cursos as $m){
                $lista = array();
                $lista[] =$m["Curso"]["id"];
				$lista[] =$m["Curso"]["name"];
                $lista[] =$m["Grauacademico"]["name"];
                $lista[] =$m["Tipocurso"]["name"];
                $listas[] =$lista;
            }
           // $this->set('cursos',$this->Curso->find('all'));
           $this->set('lista',$listas);
           $this->layout = 'pdf'; //this will use the pdf.ctp layout
           $this->render();
        }
}
?>