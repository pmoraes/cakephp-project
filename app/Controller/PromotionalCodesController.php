<?php

class PromotionalCodesController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function admin_index() {
		$promotionalCodes = $this->getRepository("PromotionalCodeRepository")->getAllPromotionalCode();
		
		$this->set('promotionalCodes', $promotionalCodes);
	}

	public function admin_add() {
        $clients = $this->getRepository('ClientRepository')->getListClients();
        if ($this->request->is('post')) {
            $promotionalCode = md5(md5(time()));
            $this->request->data['PromotionalCode']['code'] = $promotionalCode;

    		if ($this->PromotionalCode->save($this->request->data)) {

                $clients = $this->getRepository('ClientRepository')->getClientsById($this->request->data['Client']['Client']);

                $this->set('code', $promotionalCode);
                $this->set('discount', $this->request->data['PromotionalCode']['discount']);
                $this->set('validate', $this->request->data['PromotionalCode']['validate']);
                $this->layout = false;
                $response = $this->render('../Emails/promotions');
                
                $emails = $this->getService('ClientService')->getEmails($clients);
                $this->getService('EmailService')->sendEmail($emails,$response->body());
    			
                $this->Session->setFlash('Código Promocional foi salvo com sucesso!');
    			return $this->redirect(array('controller' => 'promotionalCodes', 'action' => 'add'));
    		}
    		$this->Session->setFlash('Ocorreu um problema ao salvar o código promocional. Tente novamente!','',array(),'error');
    	}

        $this->set('clients', $clients);
	}

	public function admin_edit($id = null) {
		$this->PromotionalCode->id = $id;

    	if(!$this->PromotionalCode->exists()) {
    		throw new NotFoundException("PromotionalCode not found!");
    	}

        if ($this->request->is('post') || $this->request->is('put')) {
            if($this->PromotionalCode->save($this->request->data)) {
                $this->Session->setFlash('Código promocional salvo com sucesso!');
                return $this->redirect(array('controller' => 'promotionalCodes', 'action' => 'index'));
            }
            $this->Session->setFlash('Houve um erro ao salvar o código promocional. Tente Novamente!','edit',array(),'error');
        } else {
            $clients = $this->getRepository('ClientRepository')->getListClients();
            $this->request->data = $this->PromotionalCode->findById($id);
            $this->set('clients', $clients);
        }
	}

	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->PromotionalCode->id = $id;

        if(!$this->PromotionalCode->exists()) {
            throw new NotFoundException("PromotionalCode not found!");
        }
            
        if($this->PromotionalCode->delete($this->request->data)) {
            $this->Session->setFlash('O código promocional '. $this->request->data['PromotionalCode']['name'] . "foi deletado com sucesso!");
            return $this->redirect(array('controller' => 'promotionalCodes', 'action' => 'index'));
        }

        $this->Session->setFlash('Não foi possível deletar o código promocional, tente novamente.','',array(),'error');
        return $this->redirect(array('controller' => 'promotionalCodes', 'action' => 'index'));
	}

    public function check() {
        $this->autoRender = false;
        
        if (isset($this->request->data['PromotionalCode']['code']) && $this->request->data['PromotionalCode']['code']) 
        {
            $code = $this->getRepository('PromotionalCodeRepository')->checkCode($this->request->data['PromotionalCode']['code']);
            
            if ($code) {
                $this->Session->write('PromotionalCode', $code);
                $this->Session->setFlash('Código informado é válido, você terá ' . $code["PromotionalCode"]["discount"] . '% de desconto nesta compra!','',array(),'code-success');
            } else {
                $this->Session->setFlash('Código informado é inválido!','',array(),'code-error');
            }
        } else {
            $this->Session->setFlash('Por favor informe um código!','',array(),'code-error');
        }

        $this->redirect('/finalizar-compra');
    }
}