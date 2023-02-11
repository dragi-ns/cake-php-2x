<?php

App::uses('AppModel', 'Model');

class Post extends AppModel {
	public $belongsTo = 'User';
	public $validate = [
		'title' => ['rule' => 'notBlank'],
		'body' => ['rule' => 'notBlank']
	];

	public function isOwnedBy($post, $user) {
		return $this->field('id', ['id' => $post, 'user_id' => $user]) !== false;
	}
}
