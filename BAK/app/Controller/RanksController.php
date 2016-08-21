<?php
App::uses('AppController', 'Controller');
/**
 * Ranks Controller
 *
 * @property Rank $Rank
 */
class RanksController extends AppController {

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
		$this->layout = "admin";
		$this->Rank->recursive = 0;
		$this->set('ranks', $this->paginate());
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
		$this->layout = "admin";
		$this->Rank->id = $id;
		if (!$this->Rank->exists()) {
			throw new NotFoundException(__('Invalid rank'));
		}
		$this->set('rank', $this->Rank->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->layout = "admin";
		if ($this->request->is('post')) {
			$this->Rank->create();
			if ($this->Rank->save($this->request->data)) {
				$this->Session->setFlash(__('The rank has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rank could not be saved. Please, try again.'));
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
		$this->layout = "admin";
		$this->Rank->id = $id;
		if (!$this->Rank->exists()) {
			throw new NotFoundException(__('Invalid rank'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Rank->save($this->request->data)) {
				$this->Session->setFlash(__('The rank has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rank could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Rank->read(null, $id);
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
		$this->layout = "admin";
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Rank->id = $id;
		if (!$this->Rank->exists()) {
			throw new NotFoundException(__('Invalid rank'));
		}
		if ($this->Rank->delete()) {
			$this->Session->setFlash(__('Rank deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Rank was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
