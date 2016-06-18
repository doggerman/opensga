<?php
App::uses('AppModel', 'Model');

/**
 * EstadoMatricula Model
 *
 * @property Candidatura $Candidatura
 * @property Matricula $Matricula
 */
class EstadoMatricula extends AppModel
{


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = [
        'Candidatura' => [
            'className' => 'Candidatura',
            'foreignKey' => 'estado_matricula_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ],
        'Matricula' => [
            'className' => 'Matricula',
            'foreignKey' => 'estado_matricula_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ],
    ];

}
