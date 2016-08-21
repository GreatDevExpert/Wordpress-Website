<?php
App::uses('War', 'Model');

/**
 * War Test Case
 *
 */
class WarTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.war',
		'app.history',
		'app.veteran',
		'app.branch',
		'app.rank'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->War = ClassRegistry::init('War');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->War);

		parent::tearDown();
	}

}
