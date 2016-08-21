<?php
App::uses('AppController', 'Controller');
/**
 * Links Controller
 *
 * @property Link $Link
 */
class LinksController extends AppController {

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
		$links = $this->paginate();
		if (isset($this->request->params['requested'])) {
			return $links;
		} else {
			$this->set('links', $links);
		}
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
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Invalid link'));
		}
		$this->set('link', $this->Link->read(null, $id));
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
			$this->Link->create();
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('The link has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link could not be saved. Please, try again.'));
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
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Invalid link'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('The link has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The link could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Link->read(null, $id);
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
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Invalid link'));
		}
		if ($this->Link->delete()) {
			$this->Session->setFlash(__('Link deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Link was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
