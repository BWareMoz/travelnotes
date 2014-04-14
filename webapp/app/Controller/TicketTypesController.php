<?php
App::uses('AppController', 'Controller');
/**
 * TicketTypes Controller
 *
 * @property TicketType $TicketType
 * @property PaginatorComponent $Paginator
 */
class TicketTypesController extends AppController {

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
		$this->TicketType->recursive = 0;
		$this->set('ticketTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TicketType->exists($id)) {
			throw new NotFoundException(__('Invalid ticket type'));
		}
		$options = array('conditions' => array('TicketType.' . $this->TicketType->primaryKey => $id));
		$this->set('ticketType', $this->TicketType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TicketType->create();
			if ($this->TicketType->save($this->request->data)) {
				$this->Session->setFlash(__('The ticket type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ticket type could not be saved. Please, try again.'));
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
		if (!$this->TicketType->exists($id)) {
			throw new NotFoundException(__('Invalid ticket type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TicketType->save($this->request->data)) {
				$this->Session->setFlash(__('The ticket type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ticket type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TicketType.' . $this->TicketType->primaryKey => $id));
			$this->request->data = $this->TicketType->find('first', $options);
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
		$this->TicketType->id = $id;
		if (!$this->TicketType->exists()) {
			throw new NotFoundException(__('Invalid ticket type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TicketType->delete()) {
			$this->Session->setFlash(__('The ticket type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ticket type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
