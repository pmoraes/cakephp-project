<?php

class SubCategoriesController extends AppController {

	public function admin_index()	{
		$subCategories = $this->getRepository("SubCategoryRepository")->getAllSubCategories();
		
		$this->set('subCategories', $subCategories);
	}

	public function admin_add() {		
		$categories = $this->getRepository("SubCategoryRepository")->getAllCategories();
		
		if ($this->request->is('post')) {
    		if ($this->SubCategory->save($this->request->data)) {
    			$this->Session->setFlash('SubCategoria foi salva com sucesso!');
    			return $this->redirect(array('controller' => 'subCategories', 'action' => 'add'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar a subcategoria. Tente novamente!','',array(),'error');
    	}
    	$this->set('categories', $categories);
	}

	public function admin_edit($id = null) {

		$this->SubCategory->id = $id;
        $categories = $this->getRepository("SubCategoryRepository")->getAllCategories();

    	if(!$this->SubCategory->exists()) {
    		throw new NotFoundException("SubCategory not found!");
    	}

    	if ($this->request->is('post') || $this->request->is('put')) {
    		if($this->SubCategory->save($this->request->data)) {
    			$this->Session->setFlash('Sub Categoria salva com sucesso!');
    			return $this->redirect(array('controller' => 'subCategories', 'action' => 'index'));
    		}
    		$this->Session->setFlash('Houve um erro ao salvar a Sub Categoria. Tente Novamente!','edit',array(),'error');
    	} 
    	else {
    		$this->request->data = $this->SubCategory->findById($id);
    	}

        $this->set('categories', $categories);
	}

	public function admin_view($id = null) {

	}

	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->SubCategory->id = $id;

        if(!$this->SubCategory->exists()) {
            throw new NotFoundException("SubCategory not found!");
        }
            
        if($this->SubCategory->delete($this->request->data)) {
            $this->Session->setFlash('Sub Categoria '. $this->request->data['SubCategory']['name'] . "foi deletada com sucesso!");
            return $this->redirect(array('controller' => 'subCategories', 'action' => 'index'));
        }

        $this->Session->setFlash('Não foi possível deletar a sub categoria, tente novamente.','',array(),'error');
        return $this->redirect(array('controller' => 'subCategories', 'action' => 'index'));
	}

    public function getSubCategories($id) {
        $this->autoRender = false;
        if(!$id) {
            throw new Exception("Id cannot be null!");
        }

        $subCategories = $this->getRepository("SubCategoryRepository")->getSubCategoriesByCategoryId($id);
        return json_encode($subCategories);
    }
}