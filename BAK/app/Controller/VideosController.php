<?php
App::uses('AppController', 'Controller');
/**
 * Videos Controller
 *
 * @property Video $Video
 */
class VideosController extends AppController {

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authError = "Please log in first in order to preform that action.";
		parent::beforeFilter();
		$this->Auth->deny();
		$this->Auth->allow('index', 'featured');
		$this->layout = 'inner';
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		if ( isset($this->request->params['named']['featured']) ) {
			//$this->paginate['conditions'] = array('featured' => $this->request->params['named']['featured']);
			$this->paginate = array(
				'conditions' => array('featured' => $this->request->params['named']['featured']),
				'order' => 'RAND()',
				'limit' => 1
			);
		}

		$this->Video->recursive = 0;
		$this->layout = "admin";

		$videos = $this->paginate('Video');

		if (isset($this->request->params['requested'])) {
			return $videos;
		} else {
			$this->set('videos', $videos);
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
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->set('video', $this->Video->read(null, $id));
	}

/**
 * watch method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function watch($id = null) {
CakeLog::write('calls', "calling: " . $this->name . "/" . $this->action);
		$this->layout = "inner";
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->set('video', $this->Video->read(null, $id));
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
			$image_url = '';
			//Need to get the link to the thumbnail here based on the embed code
			if ( preg_match("/www\.youtube\.com/", $this->request->data['Video']['embed'] ) ) {
				//For you tube need to split on ?, then on /
				preg_match('/src=".*" /U', $this->request->data['Video']['embed'], $matches);
				preg_match('/".*" /U', $matches[0], $matches);
				$matches[0] = str_replace('"', '', $matches[0]);
				$matches = explode("?", $matches[0]);
				$matches = explode('/', $matches[0]);
				$this->request->data['Video']['thumbnail'] = "http://img.youtube.com/vi/" . $matches[4] . "/default.jpg";
			} else if ( preg_match("/player\.vimeo\.com/", $this->request->data['Video']['embed'] ) ) {
				//For vimeo just need to grab the last part of the source url
				preg_match('/src=".*" /U', $this->request->data['Video']['embed'], $matches);
				$matches[0] = str_replace('"', '', $matches[0]);
				$matches = explode('/', $matches[0]);
				$matches[0] = str_replace(' ', '', $matches[4]);
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/" . $matches[0] . ".php"));
				$this->request->data['Video']['thumbnail'] = $hash[0]['thumbnail_small'];
			} else if ( preg_match("/video\.pbs\.org/", $this->request->data['Video']['embed'] ) ) {
				//For PBS need to explode on &, then on /
				preg_match('/video=.*" /U', $this->request->data['Video']['embed'], $matches);
				$matches[0] = str_replace('"', '', $matches[0]);
				$matches = explode('&', $matches[0]);
				$matches = explode('/', $matches[0]);
				$this->request->data['Video']['thumbnail'] = "http://www-tc.pbs.org/video/media/images/assets/videos/" . $matches[4] . "/" . $matches[4] . "_ThumbnailCOVEDefault.jpg";
			}

			$this->Video->create();
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
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
		$this->layout = "inner";
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Video->read(null, $id);
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
		$this->layout = "inner";
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->Video->delete()) {
			$this->Session->setFlash(__('Video deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Video was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
