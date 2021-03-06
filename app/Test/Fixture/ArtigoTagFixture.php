<?php

/**
 * ArtigoTag Fixture
 */
class ArtigoTagFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = [
        'id' => [
            'type' => 'integer',
            'null' => false,
            'default' => null,
            'length' => 10,
            'unsigned' => true,
            'key' => 'primary',
        ],
        'name' => [
            'type' => 'string',
            'null' => false,
            'default' => null,
            'length' => 45,
            'key' => 'unique',
            'collate' => 'latin1_swedish_ci',
            'charset' => 'latin1',
        ],
        'created' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'modified' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'created_by' => [
            'type' => 'integer',
            'null' => true,
            'default' => null,
            'length' => 10,
            'unsigned' => true,
        ],
        'modified_by' => [
            'type' => 'integer',
            'null' => true,
            'default' => null,
            'length' => 10,
            'unsigned' => true,
        ],
        'estado_objecto_id' => [
            'type' => 'integer',
            'null' => false,
            'default' => null,
            'length' => 3,
            'unsigned' => true,
        ],
        'indexes' => [
            'PRIMARY' => ['column' => 'id', 'unique' => 1],
            'name_UNIQUE' => ['column' => 'name', 'unique' => 1],
        ],
        'tableParameters' => ['charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB'],
    ];

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-01-14 21:06:31',
            'modified' => '2016-01-14 21:06:31',
            'created_by' => 1,
            'modified_by' => 1,
            'estado_objecto_id' => 1,
        ],
    ];

}
