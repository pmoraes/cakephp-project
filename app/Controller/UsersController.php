<?php 

class UsersController extends AppController
{
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	public function admin_login() {
		$this->layout = "admin_login";
		
		if($this->request->is('post')) {
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('Usuário e senha estão incorretos!');
			}
		}
	}

	public function admin_resetPassword() {
		$this->layout = "admin_login";
	}

	public function admin_logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function add() {		
		if ($this->request->is('post')) {

    		if ($this->Category->save($this->request->data)) {
    			$this->Session->setFlash('Categoria foi salva com sucesso!');
    			return $this->Auth->redirect(array('controller' => 'categories', 'action' => 'add'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar a categoria. Tente novamente!','',array(),'error');
    	}
	}
}