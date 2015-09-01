<?php

class ManufacturersController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function admin_index() {
		$manufacturers = $this->getRepository("ManufacturerRepository")->getAllManufacturers();
		
		$this->set('manufacturers', $manufacturers);
	}

	public function admin_add() {
        $states = $this->getRepository('ManufacturerRepository')->getAllStates();

		if ($this->request->is('post')) {
    		if ($this->Manufacturer->save($this->request->data)) {
    			$this->Session->setFlash('Fabricante foi salva com sucesso!');
    			return $this->redirect(array('controller' => 'manufacturers', 'action' => 'add'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar o fabricante. Tente novamente!','',array(),'error');
    	}

        $this->set('states', $states);
	}

	public function admin_edit($id = null) {
		$this->Manufacturer->id = $id;

    	if(!$this->Manufacturer->exists()) {
    		throw new NotFoundException("Manufacturer not found!");
    	}

        if ($this->request->is('post') || $this->request->is('put')) {
            if($this->Manufacturer->save($this->request->data)) {
                $this->Session->setFlash('Fabricante salvo com sucesso!');
                return $this->redirect(array('controller' => 'manufacturers', 'action' => 'index'));
            }
            $this->Session->setFlash('Houve um erro ao salvar o fabricante. Tente Novamente!','edit',array(),'error');
        } else {
            $this->request->data = $this->Manufacturer->findById($id);
        }

        $states = $this->getRepository('ManufacturerRepository')->getAllStates();

        $this->set('states', $states);
	}

	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->Manufacturer->id = $id;

        if(!$this->Manufacturer->exists()) {
            throw new NotFoundException("Manufacturer not found!");
        }
            
        if($this->Manufacturer->delete($this->request->data)) {
            $this->Session->setFlash('Fabricante '. $this->request->data['Manufacturer']['name'] . "foi deletada com sucesso!");
            return $this->redirect(array('controller' => 'manufacturers', 'action' => 'index'));
        }

        $this->Session->setFlash('Não foi possível deletar a categoria, tente novamente.','',array(),'error');
        return $this->redirect(array('controller' => 'manufacturers', 'action' => 'index'));
	}
}