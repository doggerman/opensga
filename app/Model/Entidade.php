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
 ** @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.10.0.0

 * 
 */
 
 
 
class Entidade extends AppModel {
	var $name = 'Entidade';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
    
    
    
    
	var $belongsTo = array(
			'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Genero' => array(
			'className' => 'Genero',
			'foreignKey' => 'genero_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Paise' => array(
			'className' => 'Paise',
			'foreignKey' => 'paise_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cidade' => array(
			'className' => 'Cidade',
			'foreignKey' => 'cidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'CidadeNascimento' => array(
			'className' => 'Cidade',
			'foreignKey' => 'natcidade',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Provincia' => array(
			'className' => 'Provincia',
			'foreignKey' => 'provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DocumentoIdentificacao' => array(
			'className' => 'DocumentoIdentificacao',
			'foreignKey' => 'documento_identificacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estadoentidade' => array(
			'className' => 'Estadoentidade',
			'foreignKey' => 'estadoentidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    public $hasOne = array(
        'Docente' => array(
            'className'    => 'Docente',
            'foreignKey'   =>'entidade_id',
            'dependent'    => true
        ),
        'Aluno' => array(
            'className'    => 'Aluno',
            'foreignKey'   =>'entidade_id',
            'dependent'    => true
        ),
        'Funcionario' => array(
            'className'    => 'Funcionario',
            'foreignKey'   =>'entidade_id',
            'dependent'    => true
        )
    );
    
	

}
?>