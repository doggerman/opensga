<?php
/**
 * CakePHP DatabaseLog Plugin
 *
 * Licensed under The MIT License.
 *
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/dereuromark/CakePHP-DatabaseLog
 */

/**
 * Log fixtures
 */
class LogFixture extends CakeTestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    public $fields = [
        'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'],
        'type' => [
            'type' => 'string',
            'null' => false,
            'default' => null,
            'length' => 50,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8',
        ],
        'message' => [
            'type' => 'text',
            'null' => false,
            'default' => null,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8',
        ],
        'created' => ['type' => 'datetime', 'null' => true, 'default' => null],
        'ip' => [
            'type' => 'string',
            'null' => true,
            'default' => null,
            'length' => 50,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8',
        ],
        'hostname' => [
            'type' => 'string',
            'null' => true,
            'default' => null,
            'length' => 50,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8',
        ],
        'uri' => [
            'type' => 'string',
            'null' => true,
            'default' => null,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8',
        ],
        'refer' => [
            'type' => 'string',
            'null' => true,
            'default' => null,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8',
        ],
        'user_agent' => [
            'type' => 'string',
            'null' => true,
            'default' => null,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8',
        ],
        'number' => ['type' => 'integer', 'null' => false, 'default' => 0],
        'indexes' => ['PRIMARY' => ['column' => 'id', 'unique' => 1]],
        'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'],
    ];

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'type' => 'Lorem ipsum dolor sit amet',
            'message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2011-08-08 13:46:28',
        ],
    ];
}
