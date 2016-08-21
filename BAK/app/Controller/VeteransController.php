<?php
App::uses('AppController', 'Controller');
/**
 * Veterans Controller
 *
 * @property Veteran $Veteran
 */
class VeteransController extends AppController {

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
		$this->Veteran->recursive = 0;
		$this->set('veterans', $this->paginate());
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
		$this->Veteran->id = $id;
		if (!$this->Veteran->exists()) {
			throw new NotFoundException(__('Invalid veteran'));
		}
		$this->set('veteran', $this->Veteran->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "admin";
		if ($this->request->is('post')) {
			$this->Veteran->create();
			if ($this->Veteran->save($this->request->data)) {
				$this->Session->setFlash(__('The veteran has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The veteran could not be saved. Please, try again.'));
			}
		}
		$states = $this->Veteran->State->find('list', array('conditions' => array('country_id' => 'US' )));
		$countries = $this->Veteran->Country->find('list');
		$birthStates = $this->Veteran->BirthState->find('list');
		$this->set(compact('states', 'countries', 'birthStates'));
	}

/**
 * participate method
 *
 * @return void
 */
	public function participate() {
		$this->layout = "iframe";
		if ($this->request->is('post')) {
			$this->Veteran->create();
			if ($this->Veteran->save($this->request->data)) {
				$this->request->data['History']['veteran_id'] = $this->Veteran->getLastInsertID();
				$this->Veteran->History->save($this->request->data);
				$this->Session->setFlash(__('The veteran has been saved'));
				//$this->redirect(array('controller' => 'contents', 'action' => 'readArticle', 'id' => '8'));
				$this->redirect('/veterans/thankYou');
			} else {
				$this->Session->setFlash(__('The veteran could not be saved. Please, try again.'));
			}
		}
		$states = $this->Veteran->State->find('list', array('conditions' => array('country_id' => 'US' )));
		$countries = $this->Veteran->Country->find('list');
		//$birthStates = $this->Veteran->BirthState->find('list');
		$wars = $this->Veteran->History->War->find('list');
		$branches = $this->Veteran->History->Branch->find('list');
		$this->set(compact('states', 'countries', 'wars', 'branches'));
	}

/**
 * thankYou method
 *
 * @return void
 */
	public function thankYou() {
		$this->layout = "iframe";
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
		$this->Veteran->id = $id;
		if (!$this->Veteran->exists()) {
			throw new NotFoundException(__('Invalid veteran'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Veteran->save($this->request->data)) {
				$this->Session->setFlash(__('The veteran has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The veteran could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Veteran->read(null, $id);
		}
		$states = $this->Veteran->State->find('list');
		$countries = $this->Veteran->Country->find('list');
		$birthStates = $this->Veteran->BirthState->find('list');
		$this->set(compact('states', 'countries', 'birthStates'));
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
		$this->Veteran->id = $id;
		if (!$this->Veteran->exists()) {
			throw new NotFoundException(__('Invalid veteran'));
		}
		if ($this->Veteran->delete()) {
			$this->Session->setFlash(__('Veteran deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Veteran was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * getBrowseList method
 *
 * @return void
 */
	public function getBrowseList() {
		$this->layout = false;
		$browse = $this->Veteran->query("SELECT UCASE(SUBSTRING(last_name FROM 1 FOR 1)) AS letter FROM veterans GROUP BY SUBSTRING(last_name FROM 1 FOR 1) ORDER BY SUBSTRING(last_name FROM 1 FOR 1)");

		$cnt = 0;
		foreach( $browse as $row ) {
			$browse[$cnt] = $row[0]['letter'];
			$cnt++;
		}

		//$browseList = '<label>Browse by Last Name:</label> <a href="/veterans/nameIndex">ALL</a> ';
		$browseList = '<b>Browse by Last Name:</b> <a href="/veterans/searchShell?function=nameIndex">ALL</a> ';
		foreach(range('A','Z') as $i) {
			if ( $key = array_search($i, $browse) != false ) {
				//$browseList .= '<a href="/veterans/nameIndex/' . $i . '">' . $i . "</a> ";
				$browseList .= '<a href="/veterans/searchShell?function=nameIndex&value=' . $i . '">' . $i . "</a> ";
			} else {
				$browseList .= $i . " ";
			}
		}
		echo $browseList;
	}

/**
 * nameIndex method
 *
 * @return void
 */
	public function nameIndex($letter = null) {
		$this->layout = "inner";
		$this->Veteran->recursive = 1;

		if ( $letter != null ) {
			$this->paginate = array(
				'conditions' => array('Veteran.last_name LIKE' => $letter . '%' ),
				'order' => array('Veteran.last_name, Veteran.first_name ASC'),
				'limit' => 5,
			);
		}
		$this->set('veterans', $this->paginate());
	}

/**
 * search method
 *
 * @return void
 */
	public function search() {
		$this->layout = "iframe";
		$wars = $this->Veteran->History->War->find('list');
		$branches = $this->Veteran->History->Branch->find('list');
		$this->set(compact('wars', 'branches'));
	}

/**
 * searchShell method
 *
 * @return void
 */
	public function searchShell() {
		$this->layout = "iframe";
		$this->set("function", $this->request->query['function']);
		$this->set("value", $this->request->query['value']);
	}

/**
 * searchByLastName method
 *
 * @return void
 */
	public function searchByLastName() {
		$this->layout = "inner";
		$value = $this->passedArgs[0];

		$this->paginate = array(
			'conditions' => array('Veteran.last_name LIKE' => "%" . $value . "%" ),
			'order' => array('Veteran.last_name, Veteran.first_name ASC'),
			'limit' => 5,
		);
		$this->set('veterans', $this->paginate());
	}

/**
 * searchByBranch method
 *
 * @return void
 */
	public function searchByBranch() {
		$this->layout = "inner";
		$value = $this->passedArgs[0];

		$this->paginate = array(
			'joins'=>array(
	   			 array('table'=>'histories',
		  			'alias'=>'History',
		  			'type'=>'left',
		  			'conditions'=>array('History.veteran_id=Veteran.id')
		  		),
	    		),
			'conditions' => array('History.branch_id' => $value),
			'order' => array('Veteran.last_name, Veteran.first_name ASC'),
			'limit' => 5,
		);
		$this->set('veterans', $this->paginate());
	}

/**
 * searchByWar method
 *
 * @return void
 */
	public function searchByWar() {
		$this->layout = "inner";
		$value = $this->passedArgs[0];

		$this->paginate = array(
			'joins'=>array(
	   			 array('table'=>'histories',
		  			'alias'=>'History',
		  			'type'=>'left',
		  			'conditions'=>array('History.veteran_id=Veteran.id')
		  		),
	    		),
			'conditions' => array('History.war_id' => $value),
			'order' => array('Veteran.last_name, Veteran.first_name ASC'),
			'limit' => 5,
		);
		$this->set('veterans', $this->paginate());
	}

/**
 * profile method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function profile($id = null) {
		$this->layout = "inner";
		$this->Veteran->id = $id;
		if (!$this->Veteran->exists()) {
			throw new NotFoundException(__('Invalid veteran'));
		}
		$this->set('veteran', $this->Veteran->read(null, $id));
	}

}
