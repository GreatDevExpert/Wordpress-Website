<?php
App::uses('AppController', 'Controller');
/**
 * Recordings Controller
 *
 * @property Recording $Recording
 */
class RecordingsController extends AppController {

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		$this->Auth->deny();
		//$this->Auth->allow('login', 'register', 'resetPassword');
		//$this->Auth->allow();
		$this->layout = 'inner';
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recording->recursive = 0;
		$this->set('recordings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Recording->id = $id;
		if (!$this->Recording->exists()) {
			throw new NotFoundException(__('Invalid recording'));
		}
		$this->set('recording', $this->Recording->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recording->create();
			if ($this->Recording->save($this->request->data)) {
				$this->Session->setFlash(__('The recording has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recording could not be saved. Please, try again.'));
			}
		}
		$veterans = $this->Recording->Veteran->find('list');
		$users = $this->Recording->User->find('list');
		$this->set(compact('veterans', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Recording->id = $id;
		if (!$this->Recording->exists()) {
			throw new NotFoundException(__('Invalid recording'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recording->save($this->request->data)) {
				$this->Session->setFlash(__('The recording has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recording could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Recording->read(null, $id);
		}
		$veterans = $this->Recording->Veteran->find('list');
		$users = $this->Recording->User->find('list');
		$this->set(compact('veterans', 'users'));
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
		$this->Recording->id = $id;
		if (!$this->Recording->exists()) {
			throw new NotFoundException(__('Invalid recording'));
		}
		if ($this->Recording->delete()) {
			$this->Session->setFlash(__('Recording deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recording was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
