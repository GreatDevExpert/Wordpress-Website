<?php
App::uses('AppController', 'Controller');
/**
 * Wars Controller
 *
 * @property War $War
 */
class WarsController extends AppController {

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
		$this->layout = "admin";
		$this->War->recursive = 0;
		$this->set('wars', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = "admin";
		$this->War->id = $id;
		if (!$this->War->exists()) {
			throw new NotFoundException(__('Invalid war'));
		}
		$this->set('war', $this->War->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "admin";
		if ($this->request->is('post')) {
			$this->War->create();
			if ($this->War->save($this->request->data)) {
				$this->Session->setFlash(__('The war has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The war could not be saved. Please, try again.'));
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
		$this->layout = "admin";
		$this->War->id = $id;
		if (!$this->War->exists()) {
			throw new NotFoundException(__('Invalid war'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->War->save($this->request->data)) {
				$this->Session->setFlash(__('The war has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The war could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->War->read(null, $id);
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
		$this->layout = "admin";
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->War->id = $id;
		if (!$this->War->exists()) {
			throw new NotFoundException(__('Invalid war'));
		}
		if ($this->War->delete()) {
			$this->Session->setFlash(__('War deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('War was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * getWarName method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function getWarName($id = null) {
		$war = $this->War->Find('first', array('conditions' => array('War.id' => $id), 'fields' => array('War.name')));
		return $war['War']['name'];
	}

	public function getList() {
		$this->layout = false;
		$wars = $this->War->find('list', array(
			'fields' => array('War.id', 'War.name'),
			'order' => array('War.start'),
			'recursive' => 0
		));
		$warList = "";
		foreach( $wars as $key=>$value ) {
			$warList .= $key . "," . $value . "\n";
		}
		echo rtrim($warList);
	}
}
