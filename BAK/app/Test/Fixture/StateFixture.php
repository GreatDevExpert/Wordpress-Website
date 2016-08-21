<?php
/**
 * StateFixture
 *
 */
class StateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'primary', 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'key' => 'index', 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'country_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'index', 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'sc_cc' => array('column' => array('id', 'country_id'), 'unique' => 1),
			'state' => array('column' => 'name', 'unique' => 0),
			'sc' => array('column' => 'id', 'unique' => 0),
			'cc' => array('column' => 'country_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 'Lore',
			'name' => 'Lorem ipsum dolor sit amet',
			'country_id' => ''
		),
	);

}
