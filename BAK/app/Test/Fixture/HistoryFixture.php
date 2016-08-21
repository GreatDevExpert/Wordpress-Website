<?php
/**
 * HistoryFixture
 *
 */
class HistoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'veteran_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'service_start' => array('type' => 'date', 'null' => false, 'default' => null),
		'service_end' => array('type' => 'date', 'null' => false, 'default' => null),
		'branch_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'rank_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'war_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'veteran_id' => 1,
			'service_start' => '2012-10-20',
			'service_end' => '2012-10-20',
			'branch_id' => 1,
			'rank_id' => 1,
			'war_id' => 1,
			'updated' => '2012-10-20 11:31:02',
			'created' => '2012-10-20 11:31:02'
		),
	);

}
