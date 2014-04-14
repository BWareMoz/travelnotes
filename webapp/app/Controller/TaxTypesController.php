<?php
App::uses('AppController', 'Controller');
/**
 * TaxTypes Controller
 *
 * @property TaxType $TaxType
 * @property PaginatorComponent $Paginator
 */
class TaxTypesController extends AppController {

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
		$this->TaxType->recursive = 0;
		$this->set('taxTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TaxType->exists($id)) {
			throw new NotFoundException(__('Invalid tax type'));
		}
		$options = array('conditions' => array('TaxType.' . $this->TaxType->primaryKey => $id));
		$this->set('taxType', $this->TaxType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TaxType->create();
			if ($this->TaxType->save($this->request->data)) {
				$this->Session->setFlash(__('The tax type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tax type could not be saved. Please, try again.'));
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
		if (!$this->TaxType->exists($id)) {
			throw new NotFoundException(__('Invalid tax type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TaxType->save($this->request->data)) {
				$this->Session->setFlash(__('The tax type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tax type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TaxType.' . $this->TaxType->primaryKey => $id));
			$this->request->data = $this->TaxType->find('first', $options);
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
		$this->TaxType->id = $id;
		if (!$this->TaxType->exists()) {
			throw new NotFoundException(__('Invalid tax type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TaxType->delete()) {
			$this->Session->setFlash(__('The tax type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tax type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
