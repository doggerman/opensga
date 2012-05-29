<?php
/**
 * Model do Funcionario
 * 
 * @copyright     Copyright 2010-2011, INFOmoz (Inform�tica-Mo�ambique) (http://infomoz.net)
 ** @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0

 * 
 */
 
 
class Funcionario extends AppModel {
	var $name = 'Funcionario';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Grauacademico' => array(
			'className' => 'Grauacademico',
			'foreignKey' => 'grauacademico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cargo' => array(
			'className' => 'Cargo',
			'foreignKey' => 'cargo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Departamento' => array(
			'className' => 'Departamento',
			'foreignKey' => 'departamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipofuncionario' => array(
			'className' => 'Tipofuncionario',
			'foreignKey' => 'tipofuncionario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Entidade' => array(
			'className' => 'Entidade',
			'foreignKey' => 'entidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UnidadeOrganica' => array(
			'className' => 'UnidadeOrganica',
			'foreignKey' => 'unidade_organica_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Seccao' => array(
			'className' => 'Seccao',
			'foreignKey' => 'seccao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Faculdade' => array(
			'className' => 'Faculdade',
			'foreignKey' => 'faculdade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'SuperiorHieraquico' => array(
			'className' => 'Funcionario',
			'foreignKey' => 'superior_hierarquico',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
        
		
	);


        function geraCodigo(){
            $id = $this->find('first', array('order' => array('funcionario.created DESC'),'fields'=>'id'));
            $ano=date('Y');
            $id_for=str_pad($id['Funcionario']['id']+1, 5,"0",STR_PAD_LEFT);
            $codigo = $ano.$id_for;
            return $codigo;
        }

        function criaUsername($name){
            $nome_lw = strtolower($name);
            $nome_ex = explode(' ',$nome_lw);
            $nome_1 = substr($nome_ex[0], 0,1);
            $nome_2 = end($nome_ex);
            $nome = $nome_1.$nome_2;
            $numero = $this->User->find('count',array('conditions'=>array('username'=>$nome)));
            if($numero>0){
                //$numero=$numero+1;
                $nome = $nome.$numero;
            }
            
            return $nome;
        }
		

		function getTurmasByFuncionario($funcionario_id){
            $query = "SELECT tt.id FROM t0010turmas tt, funcionarios tf where (tf.id = tt.funcionario_id or tt.funcionario_ass_id = tf.id) and tf.id  = {$funcionario_id} ";
           	$resultado = $this->query($query);
			return $resultado;
        }
        
        public function cadastraFuncionario(array $data){
            $dataSource = $this->getDataSource();
            
            $dataSource->begin();
            
            $data['User']['name']=$data['Entidade']['name'];
            $data['User']['username'] = $this->criaUsername($data['Entidade']['name']);
            $data['User']['codigo'] = $this->geraCodigo();
            $data['User']['password']=md5($data['User']['codigo']);
            $data['User']['group_id'] = 2;
            
            $this->User->create();
            if($this->User->save($data)){
                $data['Entidade']['user_id'] = $this->User->id;
                $this->Entidade->create();
                if($this->Entidade->save($data)){
                    $data['Funcionario']['user_id'] = $this->User->id;
                    $data['Funcionario']['entidade_id'] = $this->Entidade->id;
                    $this->create();
                    if($this->save($data)){
                        return $dataSource->commit();
                    }
                }
            }
              $dataSource->rollback();  
        }



}
?>