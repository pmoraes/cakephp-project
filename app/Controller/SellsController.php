<?php 

class SellsController extends AppController
{
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index', 'admin_index','checkCep', 'finish');
	}

	public function admin_index() {
		$sells = $this->getRepository("SellRepository")->getAllSells();
		
		$this->set('sells', $sells);
	}

	public function admin_edit($id = null) {
		$this->Sell->id = $id;

    	if(!$this->Sell->exists()) {
    		throw new NotFoundException("Sell not found!");
    	}

    	if ($this->request->is('post') || $this->request->is('put')) {
    		if($this->Sell->save($this->request->data)) {
    			$this->Session->setFlash('Venda salva com sucesso!');
    			return $this->redirect(array('controller' => 'sells', 'action' => 'index'));
    		}
    		$this->Session->setFlash('Houve um erro ao salvar a venda. Tente Novamente!','edit',array(),'error');
    	} else {
    		$this->request->data = $this->Sell->findById($id);
    	}
    	$statusSell = $this->getRepository("StatusSellRepository")->getListStatusSells();
		
		$this->set('statusSell', $statusSell);
	}

	public function checkCep() {
		$this->autoRender = false;

		if ($this->request->is('post')) {
			if (isset($this->request->data['service'])) {
				$service = $this->request->data['service'];
			} else {
				$this->Session->setFlash('Por favor, escolhar um tipo de frete para que possa ser calculado o valor!', '',array(),'check-error');
				return $this->redirect('/finalizar-compra');	
			}

			$cep = CakeSession::read('Auth.User.cep');
			$value = $this->getService('SellService')->calculateShipping($service, $cep);

			if ($value != '-3') {
				$this->Session->write('Shipping.value', $value);
				$this->Session->write('Shipping.code', $this->request->data['service']);
				return json_encode($value);
			}
		} else {
			throw new Exception("Error Processing Request", 500);
		}
	}

	public function checkout() {
		$products = CakeSession::read('Cart') ?: array();

		if (!$products) {
			return $this->redirect('/carrinho-de-compra');
		}

		$this->set('products', $products);
	}

	public function confirmSell() {
		$this->autoRender = false;

		$products = CakeSession::read('Cart') ?: array();

		if (!$products) {
			return $this->redirect('/carrinho-de-compra');
		}
		
		$result = $this->getService('SellService')->checkout($this->Carrinho);
		$sell = $this->getService('SellService')->prepareToPersist();

		if ($result) {
			if ($this->Sell->save($sell)) {
				$this->Session->delete('Cart');
				$this->Session->delete('Shipping');
				$this->redirect($result);
			}
		}
	}
}