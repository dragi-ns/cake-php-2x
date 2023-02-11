<?php

App::uses('AppController', 'Controller');


class UsersController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('register', 'logout');
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Flash->success(__('You have been logged in.'));
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again.'));
		}
	}

	public function register() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['role'] = 'author';
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('You can login with your credentials.'));
				return $this->redirect(['action' => 'login']);
			}
			$this->Flash->error(__('There was an error while registering. Please, try again.'));
		}
	}

	public function logout() {
		$this->Flash->success(__('You have been logged out.'));
		return $this->redirect($this->Auth->logout());
	}

	public function index() {
		$this->set('users', $this->User->find('all'));
	}

	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user.'));
		}
		$this->set('user', $this->User->findById($id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
	}

	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is(['post', 'put'])) {
			if ($this->Auth->user('id') === $id && $this->Auth->user('role') === 'author') {
				$this->request->data['User']['role'] = 'author';
			}
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		} else {
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);
		}
	}

	public function delete($id = null) {
		$this->request->allowMethod('post');

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user.'));
		}

		if ($this->User->delete()) {
			$this->Flash->success(__('User deleted.'));
			if ($this->Auth->user('id') === $id) {
				return $this->logout();
			}
			return $this->redirect(['action' => 'index']);
		}
		$this->Flash->error(__('User was not deleted.'));
		return $this->redirect(['action' => 'index']);
	}

	public function isAuthorized($user) {
		if (in_array($this->action, ['edit', 'delete'])) {
			$params = $this->request->params['pass'];
			if ($params) {
				$userId = $this->request->params['pass'][0];
				if ($userId === $user['id']) {
					return true;
				}
			}
		}

		return parent::isAuthorized($user);
	}
}
