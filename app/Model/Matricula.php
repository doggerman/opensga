<?php
/**
 * Model de Matricula
 * 
 * @copyright     Copyright 2010-2011, INFOmoz (Informática-Moçambique) (http://infomoz.net)
 ** @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0

 * 
 */
 
 
class Matricula extends AppModel {
	var $name = 'Matricula';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
    
    public $actsAs = array('Auditable.Auditable');
    
	var $belongsTo = array(
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'aluno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Planoestudo' => array(
			'className' => 'Planoestudo',
			'foreignKey' => 'planoestudo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estadomatricula' => array(
			'className' => 'Estadomatricula',
			'foreignKey' => 'estadomatricula_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Turno' => array(
			'className' => 'Turno',
			'foreignKey' => 'turno_id',
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
		)
	);

    var $validate = array(
        'Aluno_id' =>array(
            'rule'=>'validaMatricula',
            'message'=>'Este aluno ja possui uma matricula activa'
        )
    );


	/**
	 * Retorna todos os alunos matriculados num dado plano de estudos
	 */
	function getAllAlunosMatriculados($anolectivo_id){
		$alunos = $this->find('all',array('conditions'=>array('anolectivo_id'=>$anolectivo_id),'fields'=>array('aluno_id','Aluno.codigo')));
		return $alunos;
	}
    function validaMatricula($check){
        $aluno = $check['aluno_id'];
        $alunos = $this->find('all',array('conditions'=>array('aluno_id'=>$aluno,'estadomatricula_id'=>4)));
       
        if(empty($alunos)){return true;}
        return false;
    }
	function verificaStatusAluno($id_aluno){
       $query = "SELECT estadomatricula_id FROM matriculas WHERE aluno_id ={$id_aluno}";
	   $resultado = $this->query($query);
	   //var_dump($resultado);
	   return $resultado;
    }

    function getAlunosForMatricula(){
        App::import('Model','Aluno');
        $aluno = new Aluno;

        $matriculados_f = $this->find('list',array('conditions'=>array('estadomatricula_id'=>4,'estadomatricula_id'=>3,'estadomatricula_id'=>1),'fields'=>'aluno_id'));
        $matriculados = array();
        foreach($matriculados_f as $f){
            $matriculados[] = $f;
        }
        $alunos = $aluno->find('list',array('conditions'=>array("NOT"=>array('Aluno.id'=>$matriculados)),'order'=>array('Aluno.name')));
       return $alunos;
    }
	
	
   function getAlunosForMatricula1(){
        App::import('Model','Aluno');
        $aluno = new Aluno;

        $matriculados_f = $this->find('list',array('conditions'=>array('estadomatricula_id'=>1),'fields'=>'aluno_id'));
        $matriculados = array();
        foreach($matriculados_f as $f){
            $matriculados[] = $f;
        }
        $alunos = $aluno->find('list',array('conditions'=>array(array('Aluno.id'=>$matriculados)),'order'=>array('Aluno.name')));
       return $alunos;
    }
    
    public function getTotalMatriculasActivas($ano_lectivo_id=null)
    {
        if($ano_lectivo_id==null){
            $ano_lectivo_id = SessionComponent::read('SGAConfig.anolectivo_id');
        }
        
        return $this->find('count',array('conditions'=>array('estadomatricula_id'=>1,'Matricula.anolectivo_id'=>$ano_lectivo_id)));
    }
    
    /**
     *Grava os dados da matricula de um estudante novo Ingresso. Tambem processa o pagamento da matricula 
     */
    public function matricularNovoIngresso($data){
        
    }
    
    /**
     *Renova a Matricula de um estudante. Tambem processa o pagamento da renovação de matricula
     * @param type $data 
     */
    public function renovarMatricula($data){
        
    }
    
    /**
     *Retorna o Total de Alunos que nao renovou matricula num determinado Semestre/Ano Lectivo
     * @param type $semestre_id 
     */
    public function getTotalAlunosNaoMatriculados($semestre_id){
        //Primeiro, vemos quem renovou
        $ano_lectivo_id = $this->Anolectivo->Semestrelectivo->field('anolectivo_id',array('Semestrelectivo.id'=>$semestre_id));
        //$total_matriculas = $this->find()
       // debug($ano_lectivo_id);
    }
	
}
?>