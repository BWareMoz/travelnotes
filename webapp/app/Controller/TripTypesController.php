<?php
App::uses('AppController', 'Controller');
/**
 * TripTypes Controller
 *
 * @property TripType $TripType
 * @property PaginatorComponent $Paginator
 */
class TripTypesController extends AppController {

/**
 *  Layout
 *
 * @var string
 */
	public $layout = 'default';

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Session',
        'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
        'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
        'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'));
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TripType->recursive = 0;
		$this->set('tripTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TripType->exists($id)) {
			throw new NotFoundException(__('Invalid trip type'));
		}
		$options = array('conditions' => array('TripType.' . $this->TripType->primaryKey => $id));
		$this->set('tripType', $this->TripType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TripType->create();
			if ($this->TripType->save($this->request->data)) {
				$this->Session->setFlash(__('The trip type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trip type could not be saved. Please, try again.'));
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
		if (!$this->TripType->exists($id)) {
			throw new NotFoundException(__('Invalid trip type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TripType->save($this->request->data)) {
				$this->Session->setFlash(__('The trip type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trip type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TripType.' . $this->TripType->primaryKey => $id));
			$this->request->data = $this->TripType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TripType->id = $id;
		if (!$this->TripType->exists()) {
			throw new NotFoundException(__('Invalid trip type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TripType->delete()) {
			$this->Session->setFlash(__('The trip type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The trip type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
