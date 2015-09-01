<?php

class ConfigsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function admin_index()	{
		$configs = $this->getRepository("ConfigRepository")->getAllConfigs();
		
		$this->set('configs', $configs);
	}

	public function admin_add() {
		if ($this->request->is('post')) {

    		if ($this->Config->save($this->request->data)) {
    			$this->Session->setFlash('Configuração foi salva com sucesso!');
    			return $this->redirect(array('controller' => 'configs', 'action' => 'add'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar a configuração. Tente novamente!','',array(),'error');
    	}
	}

	public function admin_edit($id = null) {
		$this->Config->id = $id;

    	if(!$this->Config->exists()) {
    		throw new NotFoundException("Configutarion not found!");
    	}

    	if ($this->request->is('post') || $this->request->is('put')) {
    		if($this->Config->save($this->request->data)) {
    			$this->Session->setFlash('Configuração foi salvo com sucesso!');
    			return $this->redirect(array('controller' => 'configs', 'action' => 'index'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar a configuração. Tente novamente!','',array(),'error');
    	} 
    	
    	$this->request->data = $this->Config->findById($id);
	}
    
	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->Config->id = $id;

        if(!$this->Config->exists()) {
            throw new NotFoundException("Status Sell not found!");
        }
            
        if($this->Config->delete($this->request->data)) {
            $this->Session->setFlash('Configuração '. $this->request->data['Config']['name'] . "foi deletado com sucesso!");
            return $this->redirect(array('controller' => 'configs', 'action' => 'index'));
        }

        $this->Session->setFlash('Ocorreu um problema ao deletar a configuração. Tente novamente!','',array(),'error');
        return $this->redirect(array('controller' => 'configs', 'action' => 'index'));
	}
}