<?php

class ContactsController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('add');
	}

	public function admin_index() {
		$contacts = $this->getRepository("ContactRepository")->getContactsSent();

		$this->set('contacts', $contacts);
	}

	public function admin_edit($id = null) {
        $this->Contact->id = $id;

        if(!$this->Contact->exists()) {
            throw new NotFoundException("Contact not found!");
        }

        if (!$this->Contact->saveField('seen', 1)) {
            $this->Session->setFlash('Não foi possível marcar como lido. Tente Novamente!','edit',array(),'error');
            return $this->redirect(array('controller' => 'contacts', 'action' => 'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if($this->Contact->save($this->request->data)) {
                
                $this->layout = false;
                $this->set('response', $this->request->data['Contact']['response']);
                $content = $this->render('../Emails/contact');
                $email = $this->getService('EmailService')->sendEmail($this->request->data['Contact']['email'], $content->body());
                
                if (!$email) {
                    $this->Session->setFlash('Email não foi enviado. Tente novamente!','edit',array(),'error');
                    return $this->redirect(array('controller' => 'contacts', 'action' => 'edit'));
                }        

                $this->Session->setFlash('Menssagem foi salvo com sucesso!');
                return $this->redirect(array('controller' => 'contacts', 'action' => 'index'));
            }

            $this->Session->setFlash('Ocorreu um problema ao salvar enviar a menssagem. Tente novamente!','edit',array(),'error');
        } else {

            $this->request->data = $this->Contact->findById($id);
        }
	}

    public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->Contact->id = $id;

        if(!$this->Contact->exists()) {
            throw new NotFoundException("Contact not found!");
           }
            
        if($this->Contact->delete($this->request->data)) {
            $this->Session->setFlash('Contato '. $this->request->data['Contact']['name'] . "foi deletado com sucesso!");
            return $this->redirect(array('controller' => 'contacts', 'action' => 'index'));
        }

        $this->Session->setFlash('Não foi possível deletar o contato, tente novamente.','',array(),'error');
        return $this->redirect(array('controller' => 'contacts', 'action' => 'index'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash('Menssagem enviada com sucesso!');
                return $this->redirect(array('controller' => 'contacts', 'action' => 'add'));
            }
            $this->Session->setFlash('Ocorreu um problema ao enviar sua menssagem. Tente novamente!','',array(),'error');
        }
    }
}