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
 
 
class Curso extends AppModel {
	var $name = 'Curso';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'GrauAcademico' => array(
			'className' => 'GrauAcademico',
			'foreignKey' => 'grauacademico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Escola' => array(
			'className' => 'Escola',
			'foreignKey' => 'escola_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipocurso' => array(
			'className' => 'Tipocurso',
			'foreignKey' => 'tipocurso_id',
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
		)
	);

	var $hasMany = array(
		'Planoestudo' => array(
			'className' => 'Planoestudo',
			'foreignKey' => 'curso_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Turma' => array(
			'className' => 'Turma',
			'foreignKey' => 'curso_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    var $validate = array(
    'codigo' => array(
        'rule' => 'isUnique',
        'message' => 'Este codigo ja foi usado por outro curso.'
    ),
    'name' => array(
        'rule' => 'isUnique',
        'message' => 'Ja existe um curso com este nome.'
    )
        
);

    function geraCodigo(){
            $id = $this->find('first', array('order' => array('Curso.created DESC'),'fields'=>'id'));
            $ano=date('Y');
            $id_for=str_pad($id['Curso']['id']+1, 4,"0",STR_PAD_LEFT);
            $codigo = "C".$id_for;
            return $codigo;
        }

}
?>