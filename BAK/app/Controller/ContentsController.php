<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {


/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		//$this->Auth->deny();
		//$this->Auth->allow('categoryIndex', 'readArticle', 'getArticle');
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
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
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
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->set('content', $this->Content->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "admin";
		if ($this->request->is('post')) {
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		}

		$categories = $this->Content->Category->generateTreeList(null, null, null, '_', 0);
		$this->set(compact('categories'));
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
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash(__('The content has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Content->read(null, $id);
		}
		$categories = $this->Content->Category->find('list');
		$this->set(compact('categories'));
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
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->Content->delete()) {
			$this->Session->setFlash(__('Content deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * categoryIndex method
 *
 * @return void
 */
	public function categoryIndex() {
		$id = $this->request->params['named']['id'];
		$this->layout = "inner";
		$this->Content->recursive = 0;
		$contentList = $this->Content->find('all', array('conditions' => array('Content.category_id' => $id)));
		if ( empty($contentList) ) {
			$children = $this->Content->Category->children($id, 'true');
			if ( !empty($children) )
				$contentList = $this->Content->find('all', array('conditions' => array('Content.category_id' => $children[0]['Category']['id'])));
		}

		$this->set('contentList', $contentList);

		//Path for the "breadcrumbs"
		$path = $this->Content->Category->getPath($id);
		//$this->set('path', $path);

		$parent_id = $path[0]['Category']['id'];
		$title = $this->Content->Category->find('first', array('conditions' => array('Category.id' => $parent_id), 'fields' => array('Category.name')));
		$this->set('title', $title['Category']['name']);

		//Children of this category
		$children = $this->Content->Category->children($parent_id, 'true');
		$this->set('children', $children);
	}

/**
 * readArticle method
 *
 * @return void
 */
	public function readArticle() {
		$id = $this->request->params['named']['id'];
		$this->layout = "inner";
		$this->Content->recursive = 0;
		$article = $this->Content->find('first', array('conditions' => array('Content.id' => $id)));
		$this->set('article', $article);

/*
		$title = $this->Content->Category->find('first', array('conditions' => array('Category.id' => $article['Content']['category_id']), 'fields' => array('Category.name')));
		$this->set('title', $title['Category']['name']);

		$children = $this->Content->Category->children($article['Content']['category_id'], 'true');
		$this->set('children', $children);
*/
		//Path for the "breadcrumbs"
		$path = $this->Content->Category->getPath($article['Content']['category_id']);
		//$this->set('path', $path);

		if ( empty($path) ) {
			$this->set('title', $article['Content']['name']);
			$this->set('children', array());
		} else {
			$parent_id = $path[0]['Category']['id'];
			$title = $this->Content->Category->find('first', array('conditions' => array('Category.id' => $parent_id), 'fields' => array('Category.name')));
			$this->set('title', $title['Category']['name']);

			//Children of this category
			$children = $this->Content->Category->children($parent_id, 'true');
			$this->set('children', $children);
		}
	}

/**
 * getArticle method
 *
 * @return void
 */
	public function getArticle() {
		$this->layout = 'admin';
		//$this->render(false);

		$id = $this->passedArgs[0];

		$article = $this->Content->find('first', array('conditions' => array('Content.id' => $id), 'fields' => array('Content.content')));

		if (isset($this->request->params['requested'])) {
			return $article;
		} else {
			$this->set('article', $article);
		}
	}
}
