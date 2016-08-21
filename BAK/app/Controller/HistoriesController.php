<?php
App::uses('AppController', 'Controller');
/**
 * Histories Controller
 *
 * @property History $History
 */
class HistoriesController extends AppController {

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
		$this->layout = "inner";
		$this->History->recursive = 0;
		$this->set('histories', $this->paginate());
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
		$this->layout = "inner";
		$this->History->id = $id;
		if (!$this->History->exists()) {
			throw new NotFoundException(__('Invalid history'));
		}
		$this->set('history', $this->History->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->layout = "inner";
		if ($this->request->is('post')) {
			$this->History->create();
			if ($this->History->save($this->request->data)) {
				$this->Session->setFlash(__('The history has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The history could not be saved. Please, try again.'));
			}
		}
		$veterans = $this->History->Veteran->find('list');
		$branches = $this->History->Branch->find('list');
		$ranks = $this->History->Rank->find('list');
		$wars = $this->History->War->find('list');
		$this->set(compact('veterans', 'branches', 'ranks', 'wars'));
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
		$this->layout = "inner";
		$this->History->id = $id;
		if (!$this->History->exists()) {
			throw new NotFoundException(__('Invalid history'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->History->save($this->request->data)) {
				$this->Session->setFlash(__('The history has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The history could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->History->read(null, $id);
		}
		$veterans = $this->History->Veteran->find('list');
		$branches = $this->History->Branch->find('list');
		$ranks = $this->History->Rank->find('list');
		$wars = $this->History->War->find('list');
		$this->set(compact('veterans', 'branches', 'ranks', 'wars'));
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
		$this->layout = "inner";
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->History->id = $id;
		if (!$this->History->exists()) {
			throw new NotFoundException(__('Invalid history'));
		}
		if ($this->History->delete()) {
			$this->Session->setFlash(__('History deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('History was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
