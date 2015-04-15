<?php

App::uses('AppModel', 'Model');

/**
 * AreaUnidade Model
 *
 * @property UnidadeOrganica $UnidadeOrganica
 */
class AreaUnidade extends AppModel {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'UnidadeOrganica' => array(
            'className' => 'UnidadeOrganica',
            'foreignKey' => 'area_unidade_id',
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

    public $validate = array(
        'name' => array(
            array('rule' => 'notempty', 'message' => 'Campo Obrigatório'),
            array('rule' => 'isUnique', 'message' => 'Já existe uma Área Funcional com este nome')
        )
    );

}
