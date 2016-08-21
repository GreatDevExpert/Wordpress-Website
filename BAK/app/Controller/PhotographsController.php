<?php
App::uses('AppController', 'Controller');
/**
 * Photographs Controller
 *
 * @property Photograph $Photograph
 */
class PhotographsController extends AppController {

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		$this->Auth->deny();
		$this->Auth->allow('index');
		$this->layout = 'inner';
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Photograph->recursive = 0;
		$this->set('photographs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Photograph->id = $id;
		if (!$this->Photograph->exists()) {
			throw new NotFoundException(__('Invalid photograph'));
		}
		$this->set('photograph', $this->Photograph->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Photograph->create();
			if ($this->Photograph->save($this->request->data)) {
				$vet_id = $this->data['Photograph']['veteran_id'];
				mkdir($_SERVER['DOCUMENT_ROOT']. "/app/webroot/img/photos/" . $vet_id, 0777, true);
				$photo_id = $this->Photograph->getLastInsertID();

				if ( $this->data['Photograph']['photo']['error'] == 0 && $this->data['Photograph']['photo']['size'] > 0 ) {
					switch ($this->data['Photograph']['photo']['type']) {
						case 'image/png':
							$im = imagecreatefrompng($this->data['Photograph']['photo']['tmp_name']);
							break;
						case 'image/jpeg':
						case 'image/pjpeg':
						case 'image/jpg':
							$im = imagecreatefromjpeg($this->data['Photograph']['photo']['tmp_name']);
							break;
						case 'image/gif':
							$im = imagecreatefromgif($this->data['Photograph']['photo']['tmp_name']);
							break;
					}
					imagejpeg($im, $_SERVER['DOCUMENT_ROOT']. "/app/webroot/img/photos/" . $vet_id . "/" . $photo_id . ".jpg", 100);
				}
				$this->Session->setFlash(__('The photograph has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photograph could not be saved. Please, try again.'));
			}
		}
		$veterans = $this->Photograph->Veteran->find('list');
		$users = $this->Photograph->User->find('list');
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
		$this->Photograph->id = $id;
		if (!$this->Photograph->exists()) {
			throw new NotFoundException(__('Invalid photograph'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Photograph->save($this->request->data)) {
				$this->Session->setFlash(__('The photograph has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The photograph could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Photograph->read(null, $id);
		}
		$veterans = $this->Photograph->Veteran->find('list');
		$users = $this->Photograph->User->find('list');
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
		$this->Photograph->id = $id;
		if (!$this->Photograph->exists()) {
			throw new NotFoundException(__('Invalid photograph'));
		}
		if ($this->Photograph->delete()) {
			$this->Session->setFlash(__('Photograph deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Photograph was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
