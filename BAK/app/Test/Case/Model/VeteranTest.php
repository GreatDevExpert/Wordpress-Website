<?php
App::uses('Veteran', 'Model');

/**
 * Veteran Test Case
 *
 */
class VeteranTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.veteran',
		'app.state',
		'app.country',
		'app.user',
		'app.group',
		'app.content',
		'app.category',
		'app.birth_state',
		'app.history',
		'app.branch',
		'app.rank',
		'app.war'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Veteran = ClassRegistry::init('Veteran');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Veteran);

		parent::tearDown();
	}

}
