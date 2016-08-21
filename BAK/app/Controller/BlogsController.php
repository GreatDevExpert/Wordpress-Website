<?php
App::uses('AppController', 'Controller');
/**
 * Blogs Controller
 *
 * @property Blog $Blog
 */
class BlogsController extends AppController {
/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		$this->Auth->deny();
		$this->Auth->allow('add', 'getComments', 'getReplies');
		$this->layout = 'inner';
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Blog->recursive = 0;
		$this->set('blogs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Blog->id = $id;
		if (!$this->Blog->exists()) {
			throw new NotFoundException(__('Invalid blog'));
		}
		$this->set('blog', $this->Blog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Blog->create();
			if ($this->Blog->save($this->request->data)) {
				//$this->Session->setFlash(__('The blog has been saved'));
				//$this->redirect(array('action' => 'index'));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
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
		$this->Blog->id = $id;
		if (!$this->Blog->exists()) {
			throw new NotFoundException(__('Invalid blog'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Blog->save($this->request->data)) {
				$this->Session->setFlash(__('The blog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Blog->read(null, $id);
		}
		$parentBlogs = $this->Blog->ParentBlog->find('list');
		$this->set(compact('parentBlogs'));
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
		$this->Blog->id = $id;
		if (!$this->Blog->exists()) {
			throw new NotFoundException(__('Invalid blog'));
		}
		if ($this->Blog->delete()) {
			$this->Session->setFlash(__('Blog deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Blog was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * getComments method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function getComments($controller = null, $cid = null) {
		return $this->Blog->find('all', array('conditions' => array('Blog.controller' => $controller, 'Blog.cid' => $cid, 'Blog.parent_id' => null), 'order' => 'Blog.created ASC'));
	}

/**
 * getReplies method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function getReplies($parent_id = null) {
		return $this->Blog->find('all', array('conditions' => array('Blog.parent_id' => $parent_id), 'order' => 'Blog.created ASC'));
	}
}
