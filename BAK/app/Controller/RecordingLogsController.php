<?php
App::uses('AppController', 'Controller');
/**
 * RecordingLogs Controller
 *
 * @property RecordingLog $RecordingLog
 */
class RecordingLogsController extends AppController {

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
		$this->RecordingLog->recursive = 0;
		$this->set('recordingLogs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RecordingLog->id = $id;
		if (!$this->RecordingLog->exists()) {
			throw new NotFoundException(__('Invalid recording log'));
		}
		$this->set('recordingLog', $this->RecordingLog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RecordingLog->create();
			if ($this->RecordingLog->save($this->request->data)) {
				$this->Session->setFlash(__('The recording log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recording log could not be saved. Please, try again.'));
			}
		}
		$recordings = $this->RecordingLog->Recording->find('list');
		$this->set(compact('recordings'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->RecordingLog->id = $id;
		if (!$this->RecordingLog->exists()) {
			throw new NotFoundException(__('Invalid recording log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecordingLog->save($this->request->data)) {
				$this->Session->setFlash(__('The recording log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recording log could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RecordingLog->read(null, $id);
		}
		$recordings = $this->RecordingLog->Recording->find('list');
		$this->set(compact('recordings'));
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
		$this->RecordingLog->id = $id;
		if (!$this->RecordingLog->exists()) {
			throw new NotFoundException(__('Invalid recording log'));
		}
		if ($this->RecordingLog->delete()) {
			$this->Session->setFlash(__('Recording log deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recording log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
