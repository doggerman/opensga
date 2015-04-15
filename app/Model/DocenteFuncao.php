<?php
App::uses('AppModel', 'Model');
/**
 * DocenteFuncao Model
 *
 * @property Docente $Docente
 */
class DocenteFuncao extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Docente' => array(
			'className' => 'Docente',
			'foreignKey' => 'docente_funcao_id',
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

}
