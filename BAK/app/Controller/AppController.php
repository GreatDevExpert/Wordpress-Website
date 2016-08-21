<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link	  http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since	 CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array('Session', 'Html', 'Form', 'Javascript');

	public $components = array(
		'Auth' => array(
			'authenticate' => array(
				'all' => array( 'scope' => array('User.active' => 1) ),
				'Form' => array( 'fields' => array('username' => 'email') ),
			),
			'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),

		),
		'Session',
	);

	function beforeFilter() {
		$this->log("Here: {$this->here}, coming from: " . $this->referer(), LOG_DEBUG);
		$this->disableCache();
		$this->Auth->authError = "Please log in first in order to preform that action.";
		$this->Auth->allow('pages', 'display');
		//$this->Auth->allow();
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		// Admin can access every action
		if (isset($user['id']) && $user['administrator'] === 'Y') {
			return true;
		}

		// Default deny
		//return false;
		return true;
	}
}
