<?php
/**
 * Created by PhpStorm.
 * User: gamalan
 * Date: 07/10/16
 * Time: 10:24
 */

namespace Application\Router;

use Phalcon\Mvc\Router\Group;

class MainRouter extends Group {
	public function initialize() {
		$this->setPaths( [
			'namespaces' => 'Application\\Controllers',
			'controller' => 'index'
		] );

		$this->add(
			'/',
			'User::search'
		);

		$this->addGet(
			'/user/index',
			'User::search'
		);
		$this->addGet(
			'/user',
			'User::search'
		);
		$this->addGet(
			'/user/new',
			'User::new'
		);
		$this->add(
			'/user/search',
			'User::search'
		);
		$this->addGet(
			'/user/edit/{id}',
			array(
				"controller" => "user",
				"action"     => "edit",
			)
		);
		$this->addGet(
			'/user/delete/{id}',
			array(
				"controller" => "user",
				"action"     => "delete",
			)
		);
		$this->addPost(
			'/user/create',
			'User::create'
		);
		$this->addPost(
			'/user/save',
			'User::save'
		);
	}
}
