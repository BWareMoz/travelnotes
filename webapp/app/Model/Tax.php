<?php
App::uses('AppModel', 'Model');
/**
 * Tax Model
 *
 * @property Ticket $Ticket
 * @property TaxType $TaxType
 */
class Tax extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ticket' => array(
			'className' => 'Ticket',
			'foreignKey' => 'ticket_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TaxType' => array(
			'className' => 'TaxType',
			'foreignKey' => 'tax_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
