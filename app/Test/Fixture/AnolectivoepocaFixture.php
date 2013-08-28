<?php
/**
 * AnolectivoepocaFixture
 *
 */
class AnolectivoepocaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'anolectivo_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'epocaavaliacao_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'key' => 'index'),
		'limite' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'anolectivo_fk' => array('column' => 'anolectivo_id', 'unique' => 0),
			'epocaavaliacao_fk' => array('column' => 'epocaavaliacao_id', 'unique' => 0)
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
