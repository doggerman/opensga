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
 
 
class JpgraphsController extends AppController {
        public  $name = 'Jpgraphs';     
        public  $uses = null;
         
         public function index(){
                $this->layout='jpgraph';
         }
		 
         public function alunos_por_provincia(){
                	
				App::import('Model','Aluno');
				$Aluno = new Aluno();
				
				$numero_alunos = $Aluno->query("select e.name,count(a.id) alunos from escolas e left join alunos a on e.id = a.escola_id group by e.id");
				$alunos = array();
				foreach($numero_alunos as $n){
					$alunos['provincia'][]=$n['e']['name'];
					$alunos['numeros'][] = $n[0]['alunos'];
				}
				
				$this->set('numero_alunos',$alunos);
               $this->layout='jpgraph';
         }		 
 }
?>