<?php
 /**
 *Controller inscrições
 *
 * Controller para o processamento das inscrições dos alunos
 * Executa todos os detalhes relacionados ás inscrições dos alunos no sistema
  * A maior parte das validações e filtragens de dados ocorrem aqui
 * 
 *
 * @copyright     Copyright 2010-2011, INFOmoz (Informática-Moçambique) (http://infomoz.net)
 * @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.inscricoes
 * @since         OpenSGA v 0.1.0
 * @version       OpenSGA v 0.5.0
 */ 
class InscricaosController extends AppController {

	var $name = 'Inscricaos';
   
	function index() {    		
		$this->Inscricao->recursive = 2;			
		$this->set('inscricaos', $this->paginate());
		
}


	function view($id = null) {
	         //App::Import('Model','Logmv');
	        //$logmv = new Logmv;
			App::Import('Model','Matricula');
            $matriculas = new Matricula;
			
			App::Import('Model','Turma');
            $turma = new Turma;
			
		if (!$id) {
			$this->Session->setFlash('Invalido %s', 'flasherror');
			$this->redirect(array('action' => 'index'));
		}
	//	$this->set('t0013inscricao', $this->Inscricao->read(null, $id));
				if (empty($this->data)) {
			$this->data = $this->Inscricao->read(null, $id);
			//$logmv->logview(11,$this->Session->read('Auth.User.id'),$id,$this->data["Inscricao"]["Aluno_id"]);
		
		}
		
		//var_dump($this->data);
		$alunos = $this->Inscricao->Aluno->find('list');
		$turmas = $this->Inscricao->Turma->find('list');
		$epocaavaliacaos = $this->Inscricao->Epocaavaliacao->find('list');		
		//$notafrequencia = $this->data['Inscricao']['notafrequencia'];
		
		
		$estadoinscricao = $this->Inscricao->Estadoinscricao->find('list');
		
		$curso = $turma->getCursoAluno($this->data['Inscricao']['t0010turma_id']);
		$curso1 = $curso[0]['tc']['name'];
		
		$docente = $turma->getDocente($this->data['Inscricao']['t0010turma_id']);
		$docente1 = $docente[0]['tf']['name'];
		
		$assistente = $turma->getAssistente($this->data['Inscricao']['t0010turma_id']);
		$assistente1 = $assistente[0]['tf']['name'];
		
		$plano = $turma->getPlanoEstudo($this->data['Inscricao']['t0010turma_id']);
		$plano1 = $plano[0]['tp']['name'];

		$turma = $turma->getTurma($this->data['Inscricao']['t0010turma_id']);
		$turma1 = $turma[0]['tt']['name'];		
	
		$turno = $turma->getTurno($this->data['Inscricao']['t0010turma_id']);
		$turno1 = $turno[0]['ttu']['name'];
	
		$anoCurricular = $turma->getAnoCurricular($this->data['Inscricao']['t0010turma_id']);
		$anoCurricular1 = $anoCurricular[0]['tt']['anocurricular'];

		$semestreCurricular = $turma->getSemestreCurricular($this->data['Inscricao']['t0010turma_id']);
		$semestreCurricular1 = $semestreCurricular[0]['tt']['semestrecurricular'];
		
		$anoLectivo = $turma->getAnoLectivo($this->data['Inscricao']['t0010turma_id']);
		$anoLectivo1 = $anoLectivo[0]['tal']['codigo'];

		
		$this->set(compact('Alunos', 'turmas', 'epocaavaliacaos', 'tg0020estadoinscricao','funcionarios','curso1','docente1','assistente1', 'plano1','turma1', 'turno1','anoCurricular1','semestreCurricular1','anoLectivo1'));
	}

	function add() {
	        App::Import('Model','Turma');
            $turma = new Turma;
			 App::Import('Model','Matricula');
            $matriculas = new Matricula;
			
		   // $ano = $this->data['Inscricao']['anocurricular'];
			//var_dump($ano);
		if (!empty($this->data)) {
		    $this->data["Inscricao"]['estadoinscricao_id'] = '1';
			$this->Inscricao->create();
			if ($this->Inscricao->save($this->data)) {
			//$logmv->logInsert(11,$this->Session->read('Auth.User.id'),$this->Inscricao->getLastInsertID(),$this->data["Inscricao"]["Aluno_id"]);
				$this->Session->setFlash('** Dados Cadastrados com Sucesso **','flashok');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao gravar dados. Por favor tente de novo.','flasherror');}
		}
		
		//$alunos = $matriculas->getAlunosForMatricula1();	
		$alunos = $matriculas->getAlunosForMatricula1();	
		$turmas = $this->Inscricao->Turma->find('list',array('order'=> array ('name ASC')));
        $disciplinas = $this->Inscricao->Turma->Disciplina->find('list',array('order'=> array ('name ASC')));
		$epocaavaliacaos = $this->Inscricao->Epocaavaliacao->find('list');
		$anolectivos = $turma->Anolectivo->find('list');
		// Anolectivos = $turma->find('all',array('id'=>$this->data['Inscricao']['t0010turma_id']));

		$curso = $turma->getCursoAluno($this->data['Inscricao']['turma_id']);
		$curso1 = $curso[0]['tc']['name'];
		
		$this->set(compact('Alunos', 'turmas', '$disciplinas','epocaavaliacaos','anolectivos','curso1'));
	}
	

    function add_turmas($inscricao_id=null){
           // App::Import('Model','Turma');
            //$turma = new Turma;
        if (!empty($this->data)) {
            
            
            $insc_base = $this->Inscricao->find('all',array('conditions'=>array('Inscricao.id'=>$this->data['Inscricao']['inscricao_id']),'recursive'=>-1));
            
            //var_dump($this->data['Inscricao']);
            $inscricao_id = $this->data['Inscricao']['inscricao_id'];
            unset($this->data['Inscricao']['inscricao_id']);
		    foreach($this->data['Inscricao'] as $insc){
				
                if(!isset($insc['Inscricao']) or $insc['Inscricao']==null){}
                else{
                $inscricao = array();
                $inscricao['Inscricao']['t0010turma_id']=$insc['Inscricao']['turma'];
                $inscricao['Inscricao']['Aluno_id'] = $insc_base[0]['Inscricao']['Aluno_id'];
                $inscricao['Inscricao']['tg0020estadoinscricao_id']=1;
                if ($this->Inscricao->save( $inscricao)) {
                   $this->Inscricao->create();
                    } else {
                       $this->Session->setFlash(sprintf(__('Erro ao gravar dados. Por favor tente de novo.', true), 't0010turma'));
                   }
            }
            }
            //$this->Inscricao->delete($inscricao_id);
            $this->Session->setFlash('** Dados Cadastrado com Sucesso **','flashok');
            $this->redirect(array('action' => 'index'));
            
        }
        $this->set('inscricao_id',$inscricao_id);
          
		   //var_dump(Anolectivos);
		
        //$turmas = $this->Inscricao->Turma->find('list',array('conditions'=>array('anocurricular'=>$ano)),array('fields'=>array('Turma.id','Turma.name')));
		$turmas = $this->Inscricao->Turma->find('list',array('fields'=>array('Turma.id','Turma.name')));
		
		
        $this->set(compact('Alunos', 't0010turmas', '$disciplinas','epocaavaliacaos'));
    }
	
	
	
	function edit($id = null) {
		$this->Inscricao->id = $id;
        if(!$this->Inscricao->exists()){
            throw new NotFoundException('Inscricao Invalida');
        }
            
			App::Import('Model','Turma');
            $turma = new Turma;
			//App::Import('Model','Logmv');
	       //$logmv = new Logmv;
			
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalido %s', 'flasherror');
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {
			if ($this->Inscricao->save($this->data)) {
				$this->Session->setFlash('Dado Editados com sucesso','flashok');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao editar dados. Por favor tente de novo.','flasherror');}
		}
		if (empty($this->data)) {
			$this->data = $this->Inscricao->read(null, $id);
			 //$logmv->logUpdate(11,$this->Session->read('Auth.User.id'),$id,$this->data["Inscricao"]["Aluno_id"]);
		
		}
		
		//var_dump($this->data);
		$alunos = $this->Inscricao->Aluno->find('list');
		$turmas = $this->Inscricao->Turma->find('list');
		$epocaavaliacaos = $this->Inscricao->Epocaavaliacao->find('list');		
		//$notafrequencia = $this->data['Inscricao']['notafrequencia'];
		
		$estadoinscricao = $this->Inscricao->Estadoinscricao->find('list');
		
		$curso = $turma->getCursoAluno($this->data['Inscricao']['t0010turma_id']);
		$curso1 = $curso[0]['tc']['name'];
		
		$docente = $turma->getDocente($this->data['Inscricao']['t0010turma_id']);
		$docente1 = $docente[0]['tf']['name'];
		
		$assistente = $turma->getAssistente($this->data['Inscricao']['t0010turma_id']);
		$assistente1 = $assistente[0]['tf']['name'];
		
		$plano = $turma->getPlanoEstudo($this->data['Inscricao']['t0010turma_id']);
		$plano1 = $plano[0]['tp']['name'];

		$turma = $turma->getTurma($this->data['Inscricao']['t0010turma_id']);
		$turma1 = $turma[0]['tt']['name'];		
	
		$turno = $turma->getTurno($this->data['Inscricao']['t0010turma_id']);
		$turno1 = $turno[0]['ttu']['name'];
	
		$anoCurricular = $turma->getAnoCurricular($this->data['Inscricao']['t0010turma_id']);
		$anoCurricular1 = $anoCurricular[0]['tt']['anocurricular'];

		$semestreCurricular = $turma->getSemestreCurricular($this->data['Inscricao']['t0010turma_id']);
		$semestreCurricular1 = $semestreCurricular[0]['tt']['semestrecurricular'];
		
		$anoLectivo = $turma->getAnoLectivo($this->data['Inscricao']['t0010turma_id']);
		$anoLectivo1 = $anoLectivo[0]['tal']['codigo'];

		
		$this->set(compact('Alunos', 't0010turmas', 'epocaavaliacaos', 'tg0020estadoinscricao','funcionarios','curso1','docente1','assistente1', 'plano1','turma1', 'turno1','anoCurricular1','semestreCurricular1','anoLectivo1'));
	}

    /**
     *Inscreve alunos depois da primeira matricula
     * @param type $aluno_id
     * @param type $matricula_id 
     * 
     * @todo A lista de disciplinas deve ter em consideracao  a tabela de precedencias 
     */
    public  function inscrever($aluno_id,$matricula_id){
       $this->loadModel('Turma');
		$this->loadModel('Aluno');
		$this->loadModel('Pagamento');
		$this->loadModel('Matricula');
		
		$aluno = $this->Aluno->findById($aluno_id);
        $matricula = $this->Inscricao->Matricula->findById($matricula_id);
        if($this->request->is('post') || $this->request->is('put')){
            
        
            if(!empty($this->request->data)){
			
			
			$aluno_id = $this->request->data['Inscricao']['aluno_id'];
            $matricula_id = $this->request->data['Inscricao']['matricula_id'];
            
			foreach($this->request->data['Inscricao']['disciplinas'] as $k=>$v){
                
                $this->Inscricao->create();
                
                $inscricao_save = array('Inscricao'=>array('aluno_id'=>$aluno_id,'turma_id'=>$v,'estadoinscricao_id'=>1,'matricula_id'=>$matricula_id,'data'=>date('Y-m-d')));
                    
					if($this->Inscricao->validaInscricao($inscricao_save)){
                        $this->Inscricao->save($inscricao_save);	
                    }
					else{
                        $turma = $this->Inscricao->Turma->findById($v);
                        $this->Session->setFlash(sprintf(__('Este aluno nao pode ser inscrito na turma %s. Provavelmente ja esta inscrito.',true),$turma['Turma']['name']),'default',array('class'=>'alert error'),$turma['Turma']['id']);
                    }
			}	
			
			
				$this->Session->setFlash(sprintf(__('O Aluno %s Foi inscrito com sucesso',true),$aluno['Aluno']['codigo']."-".""),'default',array('class'=>'alert success'));
				
				$this->redirect(array('controller'=>'alunos','action'=>'perfil_estudante',$aluno_id));
			
		}
        }
		
		$turmas = $this->Turma->getAllByAlunoForInscricao($aluno_id,$matricula_id);
        
        
        $disciplinas = array();
        foreach($turmas as $turma){
            $disciplinas[$turma['Turma']['id']] = $turma['Disciplina']['name'];
            
        }
       
		
		$this->set('aluno_id',$aluno_id);
        $this->set('matricula_id',$matricula_id);
		$this->set(compact('turmas','disciplinas')); 
    }

    /**
	 * Inscreve os alunos nas turmas que ira frequentar
	 * O diferencial desta funcao é que ela é usada no Modal na tabela dos alunos
	 * Isso torna a aplicação mais eficiente, além de ser relativamente mais charmoso :-)
	 *
	 * @param int $aluno_id o ID do aluno a ser inscrito
	 * @return void
	 * @access public
	 * @link http://book.cakephp.org/view/1031/Saving-Your-Data
	 * @Todo colocar o link para a documentação aqui
     * 
     * @todo Se o aluno tiver 2 matriculas actias, mostrar um select a escolhar
	 */	
	function inscrever_aluno($aluno_id){
		
        $this->Inscricao->Aluno->id=$aluno_id;
        if(!$this->Inscricao->Aluno->exists()){
            throw new NotFoundException(__('Aluno Invalido'));
        }
        $this->Inscricao->Aluno->Matricula->recursive = -1;
		$matricula = $this->Inscricao->Aluno->Matricula->findByAlunoIdAndEstadomatriculaIdAndAnolectivoId($aluno_id,1,$this->Session->read('SGAConfig.anolectivo_id'));
        if(!$matricula){
            $this->Session->setFlash(__('Este aluno não matriculou ou não renovou a matricula este ano','default',array('class'=>'alert error')));
            $this->redirect(array('controller'=>'alunos','action'=>'perfil_estudante',$aluno_id));
        }
        
        //Vamos considerar que o aluno so pode ter uma matricula por enquanto
        //Entao, tem uma matricula, pode inscrever
        $inscricoes_activas = $this->Inscricao->Aluno->getAllCadeirasActivas($aluno_id);
        die(debug($inscricoes_activas));
        
        $this->loadModel('Turma');
		$this->loadModel('Aluno');
		$this->loadModel('Pagamento');
		$this->loadModel('Matricula');
		die(debug($aluno_id));
		$aluno = $this->Aluno->findById($aluno_id);
		if(!empty($this->data)){
			
			//Primeiro Devemos actualizar a matricula
			/*
			 * @Todo Primeiro verificar se ainda nao esta matriculado
			 */
			$this->Matricula->recursive = -1;
			$matricula = $this->Matricula->findByAlunoId($aluno_id);
			$matricula_nova=array('Matricula'=>array('aluno_id' =>$matricula['Matricula']['aluno_id'],'curso_id'=>$matricula['Matricula']['curso_id'],'planoestudo_id'=>$matricula['Matricula']['planoestudo_id'],'data'=>date('Y-m-d'),'estadomatricula_id'=>1,'user_id'=>$this->Session->read('Auth.User.id'),'anolectivo_id'=>4,'turno_id'=>$matricula['Matricula']['turno_id']));
			$this->Matricula->create();
			$this->Matricula->save($matricula_nova);
			
			foreach($this->data['Inscricao'] as $inscricao){
				if(isset($inscricao['turma_id'])){
					$this->Inscricao->create();
					$inscricao_save = array('Inscricao'=>array('aluno_id'=>$inscricao['aluno_id'],'turma_id'=>$inscricao['turma_id'],'estadoinscricao_id'=>$inscricao['estadoinscricao_id']));
					$this->Inscricao->save($inscricao_save);
				}
				
				
			}	
			
			
				$this->Session->setFlash(sprintf(__('O Aluno %s Foi inscrito com sucesso',true),$aluno['Aluno']['codigo']."-".$aluno['Aluno']['name']),'flashok');
				$this->Pagamento->recursive = -1;
				
				/*
				 * FIXME isso nao funciona 
				 */
				$this->Pagamento->gerarPagamentos(4,$aluno_id);
				
				$pagamento_inscricao = $this->Pagamento->find('first',array('conditions'=>array('Pagamento.aluno_id'=>$aluno_id,'Pagamento.tipopagamento_id'=>2)));
				
				$pagamento_inscricao['Pagamento']['estadopagamento_id']=2;
				$this->Pagamento->save($pagamento_inscricao);
				
				$this->redirect(array('controller'=>'alunos','action'=>'index'));
			
		}
		
		$turmas = $this->Turma->getAllByAlunoForInscricao($aluno_id);
		
		$this->set('aluno_id',$aluno_id);	
		$this->set(compact('turmas'));
		
	}
	function delete($id = null) {
	    //App::Import('Model','Logmv');
	    //$logmv = new Logmv;
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 't0013inscricao'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Inscricao->delete($id)) {
		//$logmv->logDelete(11,$this->Session->read('Auth.User.id'),$id,'Delete Inscricao');
			$this->Session->setFlash('** Dados Deletados com Sucesso **','flashok');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Inscricao'));
		$this->redirect(array('action' => 'index'));
	}
	
	
        function beforeRender(){
            $this->set('current_section','manutencao');
        }

		
		
        function ajax_get_plano_estudos(){

			
            $aluno_id = $this->data['Inscricao']['Aluno_id'];
            $plano_estudo = $this->Inscricao->Aluno->getPlanoEstudoCorrente($aluno_id);
            $turmas = $this->Inscricao->Aluno->getAllTurmasByEstado($plano_estudo,$aluno_id);			
            		
            $this->layout = 'ajax';
			
        }
		
		
		function update_curso_aluno(){
			App::Import('Model','Matricula');
			App::Import('Model','Turma');
            $turma = new Turma;
            $matriculas = new Matricula;
			
			//$aluno = $this->data["Inscricao"]["Aluno_id"];
			 $curso = $matriculas->find('all',array('conditions'=>array('Aluno_id'=>$this->data['Inscricao']['Aluno_id'])));                 
			
			$turmas = $turma->find('list',array('conditions'=>array('t0003curso_id'=>$curso[0]['Curso']['id'])));
       

			$curso = $curso[0]['Curso'];	
			$this->set('curso',$curso);				
			$this->set('turmas_ano',$turmas);		
			$this->layout = 'ajax';
		}	
		
		function update_plano_aluno(){
			App::Import('Model','Matricula');
                         $matriculas = new Matricula;
			
			$curso = $matriculas->find('all',array('conditions'=>array('Aluno_id'=>$this->data['Inscricao']['Aluno_id'])));		
			$plano = $curso[0]['Planoestudo'];		
			$this->set('plano',$plano);
			$this->layout = 'ajax';
		}	
	
		function update_turma_aluno(){
			
			App::Import('Model','Turma');
            $turma = new Turma;
			$turmas = $turma->find('list',array('conditions'=>array('t0009anolectivo_id'=> $this->data["Inscricao"][      "t0009anolectivo_id"]),'order'=> array ('name ASC'),'estado'=>1));
		    //var_dump($this->data);			
			$this->set('turmas_ano',$turmas);		
			$this->layout = 'ajax';
		}

		
		function update_ano_curricular()
                {
			App::Import('Model','Turma');
                        $turma = new Turma;
                        $anolectivos = $turma->find('all',array('id'=>$this->data['Inscricao']['t0010turma_id']));
                        //$ano = $turma->getAnoCurricular($this->data['Inscricao']['t0010turma_id']);
			$ano = $anolectivos[0]['Turma']['anocurricular'];
			//var_dump($ano);
			$this->set('$t0009anolectivo',$ano);
			$this->layout = 'ajax';
		}


		function update_turma_turno(){
			App::Import('Model','Turma');
                        $turma = new Turma;

                       //var_dump($this->data['Inscricao']);
			//$turno_id = $turma->find('list',array('conditions'=>array('id'=>$this->data['Inscricao']['t0010turma_id'])));;
                        $turno_id = $turma->getTurnoTurma($this->data['Inscricao']['t0010turma_id']);

                        $turno=$turno_id[0]['ttu']['name'];
                        //var_dump($turno);
                        $this->set('turno',$turno);
			$this->layout = 'ajax';
		}


		
		
		function pdf_index(){
            Configure::write('debug',0); // Otherwise we cannot use this method while developing
            $incricao = $this->Inscricao->find('all');
			
		App::Import('Model','Inscricao');
	    $inscricao = new Inscricao;
        //App::Import('Model','Logmv');
	    //$logmv = new Logmv;
		$t0013inscricoes1 = $inscricao->find('all');

		for($i=0; $i<count($t0013inscricoes1); $i++){
			$t0009anolectivo = $inscricao->getAnolectivo($t0013inscricoes1[$i]['Inscricao']['t0010turma_id']);			
			$codigo[$i] = $t0009anolectivo[0]['tal']['codigo'];
		}
			
			
            $listas = array();
			//var_dump($incricao);
            foreach( $incricao as $m){
               $lista = array();
               $lista[] =$m['Inscricao']['id'];
			   
			   
			   
			   
			  $lista[] =$m['Anolectivo']['codigo'];
			   
			   $lista[] =$m['Aluno']['name'];
               $lista[] =$m['Turma']['name'];
			   $lista[] =$m["Turma"]["anocurricular"].' / '.$m["Turma"]["semestrecurricular"];
			   
			   	if($m['Turma']['turno_id'] == 1)
				{ $turno = "Diurno";}
				if($m['Turma']['turno_id'] == 2)
				{ $turno = "Pos-Laboral";}
				if($m['Turma']['turno_id'] == null)
				{ $turno = "Sem turno";}
			   $lista[] =$turno;
			   
				if($m['Inscricao']['tg0020estadoinscricao_id'] == 1)
				{ $estado1 = "Inscrito";}
				if($m['Inscricao']['tg0020estadoinscricao_id'] == 2)
				{ $estado1 = "Aprovado";}
				if($m['Inscricao']['tg0020estadoinscricao_id'] == 3)
				{ $estado1 = "Reprovado";}
                if($m['Inscricao']['tg0020estadoinscricao_id'] == 4)
				{ $estado1 = "Cancelada";}
				if($m['Inscricao']['tg0020estadoinscricao_id'] == 5)
				{ $estado1 = "Anulada";}
				if($m['Inscricao']['tg0020estadoinscricao_id'] == 6)
				{ $estado1 = "Excluido";}
                if($m['Inscricao']['tg0020estadoinscricao_id'] == 7)
				{ $estado1 = "Admitido";}
				if($m['Inscricao']['tg0020estadoinscricao_id'] == 8)
				{ $estado1 = "Dispensado";}
				if($m['Inscricao']['tg0020estadoinscricao_id'] == null)
				{ $estado1 = "Sem estado";}
			   $lista[] =$estado1;
              //  $lista[] =$m["Planoestudo"]["name"];
              //  $lista[] =$m["Turma"]["anosemestrecurr"];
              //  $lista[] =$m["Turno"]["name"];
			   $listas[] =$lista;
            }
           // $this->set('cursos',$this->Curso->find('all'));
		   //var_dump($listas);
		   $this->set('codigo',$codigo);
            $this->set('lista',$listas);
           $this->layout = 'pdf'; //this will use the pdf.ctp layout
            $this->render();
        }
        
        
}
?>