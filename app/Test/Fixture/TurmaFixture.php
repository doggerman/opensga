<?php
/**
 * TurmaFixture
 *
 */
class TurmaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ano_lectivo_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'curso_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'plano_estudo_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'anosemestrecurr' => array('type' => 'integer', 'null' => true, 'default' => null),
		'turno_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'disciplina_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'nummaximo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'numaprovados' => array('type' => 'integer', 'null' => true, 'default' => null),
		'mediaturma' => array('type' => 'float', 'null' => true, 'default' => null),
		'estado_turma_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'numreprovados' => array('type' => 'integer', 'null' => true, 'default' => null),
		'codigo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'anocurricular' => array('type' => 'integer', 'null' => true, 'default' => null),
		'semestrecurricular' => array('type' => 'integer', 'null' => true, 'default' => null),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'semestrelectivo_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'sala_aula_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'sequencia' => array('type' => 'integer', 'null' => true, 'default' => null),
		'peso_nota_frequencia' => array('type' => 'integer', 'null' => true, 'default' => null),
		'peso_nota_exame' => array('type' => 'integer', 'null' => true, 'default' => null),
		'nota_minima_frequencia' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '5,2'),
		'nota_minima_dispensa' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '5,2'),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null),
		'unidade_organica_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'ano_lectivo_id' => '14',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '5056',
			'anocurricular' => '2',
			'semestrecurricular' => '2',
			'name' => 'Amostragem - 2004 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '28',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '2',
			'ano_lectivo_id' => '15',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '1474',
			'anocurricular' => '2',
			'semestrecurricular' => '2',
			'name' => 'Amostragem - 2005 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '30',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '3',
			'ano_lectivo_id' => '16',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '1475',
			'anocurricular' => '2',
			'semestrecurricular' => '2',
			'name' => 'Amostragem - 2006 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '32',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '4',
			'ano_lectivo_id' => '17',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '3375',
			'anocurricular' => '2',
			'semestrecurricular' => '1',
			'name' => 'Amostragem - 2007 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '33',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '5',
			'ano_lectivo_id' => '17',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '1476',
			'anocurricular' => '2',
			'semestrecurricular' => '2',
			'name' => 'Amostragem - 2007 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '34',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '6',
			'ano_lectivo_id' => '13',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '1477',
			'anocurricular' => '2',
			'semestrecurricular' => '2',
			'name' => 'Amostragem - 2008 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '26',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '7',
			'ano_lectivo_id' => '2',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '1478',
			'anocurricular' => '2',
			'semestrecurricular' => '2',
			'name' => 'Amostragem - 2009 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '4',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '8',
			'ano_lectivo_id' => '3',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '3353',
			'anocurricular' => '2',
			'semestrecurricular' => '1',
			'name' => 'Amostragem - 2010 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '5',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '9',
			'ano_lectivo_id' => '3',
			'curso_id' => '50',
			'plano_estudo_id' => '1',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:03',
			'created' => '2013-06-15 07:06:03',
			'numreprovados' => null,
			'codigo' => '1479',
			'anocurricular' => '2',
			'semestrecurricular' => '2',
			'name' => 'Amostragem - 2010 - Licenciatura em Estatística - 2004',
			'semestrelectivo_id' => '6',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
		array(
			'id' => '10',
			'ano_lectivo_id' => '3',
			'curso_id' => '50',
			'plano_estudo_id' => '2',
			'anosemestrecurr' => null,
			'turno_id' => null,
			'disciplina_id' => '1',
			'nummaximo' => null,
			'numaprovados' => null,
			'mediaturma' => null,
			'estado_turma_id' => '1',
			'modified' => '2013-06-15 07:06:04',
			'created' => '2013-06-15 07:06:04',
			'numreprovados' => null,
			'codigo' => '1480',
			'anocurricular' => '2',
			'semestrecurricular' => '2',
			'name' => 'Amostragem - 2010 - Licenciatura em Estatística - 2010',
			'semestrelectivo_id' => '6',
			'sala_aula_id' => null,
			'sequencia' => null,
			'peso_nota_frequencia' => null,
			'peso_nota_exame' => null,
			'nota_minima_frequencia' => null,
			'nota_minima_dispensa' => null,
			'created_by' => null,
			'modified_by' => null,
			'unidade_organica_id' => '28'
		),
	);

}
