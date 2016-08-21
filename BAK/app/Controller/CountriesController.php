<?php
App::uses('AppController', 'Controller');
/**
 * Countries Controller
 *
 * @property Country $Country
 */
class CountriesController extends AppController {

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
		$this->Country->recursive = 0;
		$this->set('countries', $this->paginate());
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		$this->set('country', $this->Country->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		if ($this->request->is('post')) {
			$this->Country->create();
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash(__('The country has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
			}
		}
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash(__('The country has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Country->read(null, $id);
		}
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->Country->delete()) {
			$this->Session->setFlash(__('Country deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Country was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
