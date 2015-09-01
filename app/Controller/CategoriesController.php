<?php

class CategoriesController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('menu');
	}

	public function admin_index() {
		$categories = $this->getRepository("CategoryRepository")->getAllCategories();
		
		$this->set('categories', $categories);
	}

    public function index() {
        $categories = $this->getRepository("CategoryRepository")->getAllCategories();
        
        $this->set('categories', $categories);   
    }

	public function admin_add() {		
		if ($this->request->is('post')) {

    		if ($this->Category->save($this->request->data)) {
    			$this->Session->setFlash('Categoria foi salva com sucesso!');
    			return $this->redirect(array('controller' => 'categories', 'action' => 'add'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar a categoria. Tente novamente!','',array(),'error');
    	}
	}

	public function admin_edit($id = null) {
		$this->Category->id = $id;

    	if(!$this->Category->exists()) {
    		throw new NotFoundException("Category not found!");
    	}

    	if ($this->request->is('post') || $this->request->is('put')) {
    		if($this->Category->save($this->request->data)) {
    			$this->Session->setFlash('Categoria salva com sucesso!');
    			return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
    		}
    		$this->Session->setFlash('Houve um erro ao salvar a Categoria. Tente Novamente!','edit',array(),'error');
    	} else {
    		$this->request->data = $this->Category->findById($id);
    	}
	}
    
	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->Category->id = $id;

        if(!$this->Category->exists()) {
            throw new NotFoundException("Category not found!");
           }
            
        if($this->Category->delete($this->request->data)) {
            $this->Session->setFlash('Sub Categoria '. $this->request->data['Category']['name'] . "foi deletada com sucesso!");
            return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
        }

        $this->Session->setFlash('Não foi possível deletar a categoria, tente novamente.','',array(),'error');
        return $this->redirect(array('controller' => 'categories', 'action' => 'index'));
	}

    public function menu() {
        $categories = $this->getRepository("CategoryRepository")->getAllCategories();
        
        $this->set('categories', $categories);   
    }
}