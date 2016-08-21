<?php
App::uses('RecordingLog', 'Model');

/**
 * RecordingLog Test Case
 *
 */
class RecordingLogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recording_log',
		'app.recording',
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
		$this->RecordingLog = ClassRegistry::init('RecordingLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RecordingLog);

		parent::tearDown();
	}

}
