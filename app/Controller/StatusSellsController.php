<?php

class StatusSellsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function admin_index()	{
		$statusSells = $this->getRepository("StatusSellRepository")->getAllStatusSells();
		
		$this->set('statusSells', $statusSells);
	}

	public function admin_add() {		
		if ($this->request->is('post')) {

    		if ($this->StatusSell->save($this->request->data)) {
    			$this->Session->setFlash('Status da venda foi salva com sucesso!');
    			return $this->redirect(array('controller' => 'statusSells', 'action' => 'add'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar o status da venda. Tente novamente!','',array(),'error');
    	}
	}

	public function admin_edit($id = null) {
		$this->StatusSell->id = $id;

    	if(!$this->StatusSell->exists()) {
    		throw new NotFoundException("Status Sell not found!");
    	}

    	if ($this->request->is('post') || $this->request->is('put')) {
    		if($this->StatusSell->save($this->request->data)) {
    			$this->Session->setFlash('Status da venda foi salvo com sucesso!');
    			return $this->redirect(array('controller' => 'statusSells', 'action' => 'index'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar o status da venda. Tente novamente!','',array(),'error');
    	} 
    	
    	$this->request->data = $this->StatusSell->findById($id);
	}
    
	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->StatusSell->id = $id;

        if(!$this->StatusSell->exists()) {
            throw new NotFoundException("Status Sell not found!");
        }
            
        if($this->StatusSell->delete($this->request->data)) {
            $this->Session->setFlash('Status da venda '. $this->request->data['StatusSell']['name'] . "foi deletado com sucesso!");
            return $this->redirect(array('controller' => 'statusSells', 'action' => 'index'));
        }

        $this->Session->setFlash('Ocorreu um problema ao deletar o status da venda. Tente novamente!','',array(),'error');
        return $this->redirect(array('controller' => 'statusSells', 'action' => 'index'));
	}
}