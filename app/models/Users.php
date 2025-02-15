<?php

namespace Application\Models;

use Application\Models\BaseModel;

class Users extends BaseModel {

	/**
	 *
	 * @var integer
	 */
	public $id;

	public $name;
	public $email;

	/**
	 * Initialize method for model.
	 */
	public function initialize() {
		$this->setSchema( "test" );
		$this->setSource( "users" );
	}

	/**
	 * Returns table name mapped in the model.
	 *
	 * @return string
	 */
	public function getSource() {
		return 'users';
	}

	/**
	 * Allows to query a set of records that match the specified conditions
	 *
	 * @param mixed $parameters
	 *
	 * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
	 */
	public static function find( $parameters = null ) {
		return parent::find( $parameters );
	}

	/**
	 * Allows to query the first record that match the specified conditions
	 *
	 * @param mixed $parameters
	 *
	 * @return Users|\Phalcon\Mvc\Model\ResultInterface
	 */
	public static function findFirst( $parameters = null ) {
		return parent::findFirst( $parameters );
	}

}
