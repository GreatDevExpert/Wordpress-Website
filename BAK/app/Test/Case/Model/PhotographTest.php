<?php
App::uses('Photograph', 'Model');

/**
 * Photograph Test Case
 *
 */
class PhotographTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.photograph',
		'app.veteran',
		'app.state',
		'app.country',
		'app.user',
		'app.content',
		'app.category',
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
		$this->Photograph = ClassRegistry::init('Photograph');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Photograph);

		parent::tearDown();
	}

}
