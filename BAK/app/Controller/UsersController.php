<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		$this->Auth->deny();
		$this->Auth->allow('login', 'register', 'resetPassword', 'resetConfirm');
		//$this->Auth->allow();
		$this->layout = 'inner';
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'admin';
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'admin';
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$states = $this->User->State->find('list');
		$countries = $this->User->Country->find('list');
		$this->set(compact('states', 'countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'admin';
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$states = $this->User->State->find('list');
		$countries = $this->User->Country->find('list');
		$this->set(compact('states', 'countries'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * login method
 *
 * @return void
 */
	public function login() {
		$this->layout = 'inner';
		$this->set('title_for_layout', 'Member login');
		$this->set('header_for_layout', 'Member login');

		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect('/admins');
			} else {
				//$this->Session->setFlash("<b>There is a problem with your log in.</b> Either you have not registered or you have entered the wrong email and password combination.  If you feel you have resolved these issues and still cannot log in please contact us at admin@vhp.org", "flash");
				$this->Session->setFlash("<b>There is a problem with your log in.</b> Either you have not registered or you have entered the wrong email and password combination.  If you feel you have resolved these issues and still cannot log in please contact us at admin@vhp.org");
				//$this->redirect('/users/login');
			}
		}
		if ( !isset($this->data['User']['email']) || $this->data['User']['email'] == "" ) {
			$this->Session->delete('Message.flash');
		}
	}


/**
 * logout method
 *
 * @return void
 */
	public function logout() {
		$this->set('title_for_layout', 'Member logout');
		$this->set('header_for_layout', 'Member logout');
		$this->set('members_active', ' class="active"');
		$this->redirect($this->Auth->logout());
	}

/**
 * resetPassword method
 *
 * @return void
 */
	public function resetPassword() {
		$this->layout = 'inner';
		$this->set('title_for_layout', 'Member password rest');
		$this->set('header_for_layout', 'Member password rest');

		if ($this->request->is('post')) {
			if ( $this->request->data['User']['email'] == "" ) {
				$this->Session->setFlash(__('Please enter your email address'), true);
				return;
			}
			// initialize variables
			$password = "";
			$i = 0;
			$possible = "0123456789bcdfghjkmnpqrstvwxyz";

			// random
			while ($i < 8){
				$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

				if (!strstr($password, $char)) {
					$password .= $char;
					$i++;
				}
			}

			$count = $this->User->Find('count', array( 'conditions' => array('User.email' => $this->request->data['User']['email'])));
			if ( $count <= 0 ) {
				$this->Session->setFlash(__('You do not have an account'));
				return;
			} 

			//Need to update the db with the users password
			$this->User->query("UPDATE users SET password = '" . AuthComponent::password($password) . "' WHERE email = '" . $this->request->data['User']['email'] . "'");

			//Email the password to the user
			CakeEmail::deliver($this->request->data['User']['email'], 'VHP Password Reset', 'Your password has been reset to: ' . $password, array('from' => 'admin@vhpstudentedition.org'));
			$this->Session->setFlash(__('Your new password has been emailed to ' . $this->request->data['User']['email']));
			$this->redirect(array('action' => 'resetConfirm'));
		}
	}

/**
 * resetConfirm method
 *
 * @return void
 */
	public function resetConfirm() {
		$this->layout = 'inner';
		$this->set('title_for_layout', 'Member password rest');
		$this->set('header_for_layout', 'Member password rest');
	}

}
