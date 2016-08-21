<?php
App::uses('AppModel', 'Model');
/**
 * History Model
 *
 * @property Veteran $Veteran
 * @property Branch $Branch
 * @property Rank $Rank
 * @property War $War
 */
class History extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'veteran_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Veteran' => array(
			'className' => 'Veteran',
			'foreignKey' => 'veteran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Branch' => array(
			'className' => 'Branch',
			'foreignKey' => 'branch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Rank' => array(
			'className' => 'Rank',
			'foreignKey' => 'rank_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'War' => array(
			'className' => 'War',
			'foreignKey' => 'war_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
