<?php 

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public function beforeSave($options = array()) {
	    if (isset($this->data['User']['password'])) {
	        $passwordHasher = new SimplePasswordHasher();
	        $this->data['User']['password'] = $passwordHasher->hash(
	            $this->data['User']['password']
	        );
	    }
    	
    	return true;
	}
}