<?php
App::uses('AppController', 'Controller');
/**
 * Branches Controller
 *
 * @property Branch $Branch
 */
class BranchesController extends AppController {

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		//$this->Auth->deny();
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
		$this->Branch->recursive = 0;
		$this->set('branches', $this->paginate());
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
		$this->Branch->id = $id;
		if (!$this->Branch->exists()) {
			throw new NotFoundException(__('Invalid branch'));
		}
		$this->set('branch', $this->Branch->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "admin";
		if ($this->request->is('post')) {
			$this->Branch->create();
			if ($this->Branch->save($this->request->data)) {
				$this->Session->setFlash(__('The branch has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The branch could not be saved. Please, try again.'));
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
		$this->Branch->id = $id;
		if (!$this->Branch->exists()) {
			throw new NotFoundException(__('Invalid branch'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Branch->save($this->request->data)) {
				$this->Session->setFlash(__('The branch has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The branch could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Branch->read(null, $id);
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
		$this->Branch->id = $id;
		if (!$this->Branch->exists()) {
			throw new NotFoundException(__('Invalid branch'));
		}
		if ($this->Branch->delete()) {
			$this->Session->setFlash(__('Branch deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Branch was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * getBranchName method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id 
 * @return void
 */
	public function getBranchName($id = null) {
		$branch = $this->Branch->Find('first', array('conditions' => array('Branch.id' => $id), 'fields' => array('Branch.name')));
		return $branch['Branch']['name'];
	}  

	public function getList() {
		$this->layout = false;
		$branches = $this->Branch->find('list', array(
			'fields' => array('Branch.id', 'Branch.name'),
			'order' => array('Branch.name'),
			'recursive' => 0
		));
		$branchList = "";
		foreach( $branches as $key=>$value ) {
			$branchList .= $key . "," . $value . "\n";
		}
		echo rtrim($branchList);
	}
}
