<?php
App::uses('AppController', 'Controller');
/**
 * States Controller
 *
 * @property State $State
 */
class StatesController extends AppController {

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		//$this->Auth->deny();
		//$this->Auth->allow('login', 'register', 'resetPassword');
		$this->Auth->allow();
		$this->layout = 'inner';
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->State->recursive = 0;
		$this->set('states', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Invalid state'));
		}
		$this->set('state', $this->State->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		if ($this->request->is('post')) {
			$this->State->create();
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash(__('The state has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.'));
			}
		}
		$countries = $this->State->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Invalid state'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash(__('The state has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->State->read(null, $id);
		}
		$countries = $this->State->Country->find('list');
		$this->set(compact('countries'));
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
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Invalid state'));
		}
		if ($this->State->delete()) {
			$this->Session->setFlash(__('State deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('State was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function getList() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->layout = false;
		$states = $this->State->find('list', array(
			'fields' => array('State.id', 'State.name'),
			'conditions' => array('State.country_id' => 'US'),
			'order' => array('State.name'),
			'recursive' => 0
		));
		$stateList = "";
		foreach( $states as $key=>$value ) {
			$stateList .= $key . "," . $value . "\n";
		}
		echo rtrim($stateList);
	}
}
