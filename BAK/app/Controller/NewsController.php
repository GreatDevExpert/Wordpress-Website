<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 */
class NewsController extends AppController {

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
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
	}

/**
 * getNews method
 *
 * @return void
 */
	public function getNews() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->layout = "site";
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
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
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->set('news', $this->News->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		if ($this->request->is('post')) {
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
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
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->News->read(null, $id);
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
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->News->delete()) {
			$this->Session->setFlash(__('News deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('News was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
