<?php

App::uses('AppModel', 'Model');

/**
 * AlunoEstado Model
 *
 * @property Aluno $Aluno
 * @property MotivoEstadoAluno $MotivoEstadoAluno
 * @property Funcionario $Funcionario
 */
class AlunoEstado extends AppModel
{
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = [
        'Aluno' => [
            'className' => 'Aluno',
            'foreignKey' => 'aluno_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
        ],
        'MotivoEstadoAluno' => [
            'className' => 'MotivoEstadoAluno',
            'foreignKey' => 'motivo_estado_aluno_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
        ],
    ];

}
