<?php
App::uses('AppController', 'Controller');

/**
 * Admin controller.
 *
 */
class AdminsController extends AppController {
/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Admins';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
CakeLog::write('calls', "logged in: " . AuthComponent::user('id') . " " . AuthComponent::user('last_name'));
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		$this->Auth->deny();
		$this->layout = 'inner';
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function index() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->layout = "admin";
	}
}
