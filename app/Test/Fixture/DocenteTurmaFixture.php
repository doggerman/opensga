<?php
/**
 * DocenteTurmaFixture
 *
 */
class DocenteTurmaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'docente_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'turma_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'estado_docente_turma_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'tipo_docente_turma_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'docentes_turmas_docentes' => array('column' => 'docente_id', 'unique' => 0),
			'docente_turmas_turmas' => array('column' => 'turma_id', 'unique' => 0),
			'docentes_turmas_tipo' => array('column' => 'tipo_docente_turma_id', 'unique' => 0),
			'docentes_turmas_estados' => array('column' => 'estado_docente_turma_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
	);

}
