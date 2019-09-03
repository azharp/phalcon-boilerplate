<?php

namespace Application\Controllers;

use Application\Models\Users;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UserController extends ControllerBase {
	/**
	 * Index action
	 */
	public function indexAction() {

	}

	/**
	 * Displays the creation form
	 */
	public function newAction() {

	}

	/**
	 * Searches for users
	 */
	public function searchAction() {
		$numberPage = 1;

		$parameters = $this->persistent->parameters;
		if ( ! is_array( $parameters ) ) {
			$parameters = [];
		}
		$parameters['order'] = 'id';

		$users = Users::find( $parameters );
		if ( count( $users ) == 0 ) {
			$this->flash->notice( 'The search did not find any users' );

			$this->dispatcher->forward( [
				'controller' => 'users',
				'action'     => 'search'
			] );

			return;
		}

		$paginator = new Paginator( [
			'data'  => $users,
			'limit' => 10,
			'page'  => $numberPage
		] );

		$this->view->page = $paginator->getPaginate();
	}

	/**
	 * Edits a user
	 *
	 * @param string $id
	 */
	public function editAction() {
		if ( ! $this->request->isPost() ) {

			$id = $this->dispatcher->getParam( 'id' );

			$user = Users::findFirstByid( $id );
			if ( ! $user ) {
				$this->flash->error( 'user was not found' );

				$this->dispatcher->forward( [
					'controller' => 'user',
					'action'     => 'search'
				] );

				return;
			}

			$this->view->id = $user->id;
			$this->view->name = $user->name;
			$this->view->email = $user->email;

			$this->tag->setDefault( 'id', $user->id );
			$this->tag->setDefault( 'name', $user->name );
			$this->tag->setDefault( 'email', $user->email );

		}
	}

	/**
	 * Creates a new user
	 */
	public function createAction() {
		if ( ! $this->request->isPost() ) {
			$this->dispatcher->forward( [
				'controller' => 'user',
				'action'     => 'search'
			] );

			return;
		}

		$user     = new Users();
		$user->name = $this->request->getPost( 'name' );
		$user->email = $this->request->getPost( 'email' );


		if ( ! $user->save() ) {
			foreach ( $user->getMessages() as $message ) {
				$this->flash->error( $message );
			}

			$this->dispatcher->forward( [
				'controller' => 'user',
				'action'     => 'new'
			] );

			return;
		}

		$this->flash->success( 'user was created successfully' );

		$this->dispatcher->forward( [
			'controller' => 'user',
			'action'     => 'search'
		] );
	}

	/**
	 * Saves a user edited
	 *
	 */
	public function saveAction() {

		if ( ! $this->request->isPost() ) {
			$this->dispatcher->forward( [
				'controller' => 'user',
				'action'     => 'search'
			] );

			return;
		}

		$id   = $this->request->getPost( 'id' );
		$user = Users::findFirstByid( $id );

		if ( ! $user ) {
			$this->flash->error( 'user does not exist ' . $id );

			$this->dispatcher->forward( [
				'controller' => 'user',
				'action'     => 'search'
			] );

			return;
		}

		$user->name = $this->request->getPost( 'name' );
		$user->email = $this->request->getPost( 'email' );

		if ( ! $user->save() ) {

			foreach ( $user->getMessages() as $message ) {
				$this->flash->error( $message );
			}

			$this->dispatcher->forward( [
				'controller' => 'user',
				'action'     => 'edit',
				'params'     => [ $user->id ]
			] );

			return;
		}

		$this->flash->success( 'user was updated successfully' );

		$this->dispatcher->forward( [
			'controller' => 'user',
			'action'     => 'search'
		] );
	}

	/**
	 * Deletes a user
	 *
	 * @param string $id
	 */
	public function deleteAction() {

		$id = $this->dispatcher->getParam( 'id' );

		$user = Users::findFirstByid( $id );
		if ( ! $user ) {
			$this->flash->error( 'user was not found' );

			$this->dispatcher->forward( [
				'controller' => 'user',
				'action'     => 'search'
			] );

			return;
		}

		if ( ! $user->delete() ) {

			foreach ( $user->getMessages() as $message ) {
				$this->flash->error( $message );
			}

			$this->dispatcher->forward( [
				'controller' => 'user',
				'action'     => 'search'
			] );

			return;
		}

		$this->flash->success( 'user was deleted successfully' );

		$this->dispatcher->forward( [
			'controller' => 'user',
			'action'     => 'search'
		] );
	}

}
