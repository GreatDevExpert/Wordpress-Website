<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

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
		//$this->Auth->allow('login', 'register', 'resetPassword');
		$this->layout = 'inner';
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = "admin";
		$treelist = $this->Category->generateTreeList(null, null, null, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", 0);
		$this->set('categories', $treelist);
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "admin";
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$parents = $this->Category->find('list');
		$this->set(compact('parents'));
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Category->read(null, $id);
		}
		$parents = $this->Category->find('list');
		$this->set(compact('parents'));
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * movedown method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id, int $delta
 * @return void
 */
	public function movedown($id = null, $delta = null) {
		$this->layout = "admin";
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
	
		if ($delta > 0) {
			$this->Category->moveDown($this->Category->id, abs($delta));
		} else {
			$this->Session->setFlash('Please provide the number of positions the field should be moved down.');
		}
	
		$this->redirect(array('action' => 'index'), null, true);
	}

/**
 * moveup method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id, int $delta
 * @return void
 */
	public function moveup($id = null, $delta = null) {
		$this->layout = "admin";
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
	
		if ($delta > 0) {
			$this->Category->moveUp($this->Category->id, abs($delta));
		} else {
			$this->Session->setFlash('Please provide the number of positions the field should be moved up.');
		}
	
		$this->redirect(array('action' => 'index'), null, true);
	}

/**
 * getChildren method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id, int $delta
 * @return void
 */
	public function getChildren($id = null) {
		$this->layout = false;
		return $this->Category->children($id);
	}
}
