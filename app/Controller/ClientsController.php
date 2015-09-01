<?php 

class ClientsController extends AppController
{
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index', 'login', 'add', 'changePassword', 'resetPassword', 'cart', 'addCart', 'removeCart', 'loginToMobile');
	}

	public function admin_index() {
		
	}

	public function index() {

	}

	public function myAccount() {
		$clientId = $this->Session->read('Auth.User.id');

		$sells = $this->getRepository('SellRepository')->sellsByClient($clientId);

		$this->set('sells', $sells);
	}

	public function myAccountDetails($sellId) {
		$clientId = $this->Session->read('Auth.User.id');

		$sell = $this->getRepository('SellRepository')->sellByIdAndClient($clientId, $sellId);
		$sell = $this->getService('ClientService')->prepareProductsMyAccount($sell);
		$this->set('sell', $sell);
	}

	public function removeCart($id) {
		$this->autoRender = false;
		$this->getService('ClientService')->removeItemCart($id);

		return $this->redirect('/carrinho-de-compra');

	}

	public function deleteItem($id) {
		$this->autoRender = null;

		if ($this->request->is('post')) {
	        $this->Client->ClientProduct->id = (int) $id;

	        if(!$this->Client->ClientProduct->exists()) {
	            throw new NotFoundException("ClientProduct not found!");
	        }
	            
	        if($this->Client->ClientProduct->delete($this->request->data)) {
	            $this->Session->setFlash(
	            	'Produto '. $this->request->data['Product']['name'] . "foi deletado com sucesso!", 
	            	'',
	            	array(),
	            	'wishListSuccess'
	            );
	        } else {
	        	$this->Session->setFlash('Não foi possível deletar o produto, tente novamente.','',array(),'wishListError');
	        }

	        return $this->redirect('/lista-de-desejos');
		} 

		throw new Exception("Desculpe, mas não estou entendo o que você quer!", 500);
	}

	public function wishList() {
		$client = $this->getRepository("ClientRepository")->findById();

		$this->set('client', $client);
	}

	public function addWishList($id) {
		$this->autoRender = false;
		$this->Client->Product->id = $id;

		if (!$this->Client->Product->exists()) {
			throw new Exception("Product not found", 404);
		}

		$clientProduct = $this->getService('ClientService')->prepareClientProductToSave($id);

		if (!$this->Client->ClientProduct->save($clientProduct)) {
			throw new Exception("Internal Problem", 500);
		}
	}

	public function cart() {
		if ($this->Session->read('Cart')) {
			$products = $this->Session->read('Cart');
		} else {
			$products = array();
		}
		$this->set('products', $products);

	}

	public function addCart($id) {
		$this->autoRender = false;
		$this->Client->Product->id =$id;

		$product = $this->getRepository('ProductRepository')->hasAndIsAvailability($id);

		if (!$product) {
			throw new Exception("Product not found", 404);
		}

		$products = $this->getService('ClientService')->writeProductSession($product);
		
		return json_encode($products);
	}

	public function changePassword() {
		$this->autoRender = false;
		$this->layout = false;

		if ($this->request->is('post')) {
			if (isset($this->request->data['Client']['email'])) {
				$user = $this->getRepository('ClientRepository')->findByEmail($this->request->data['Client']['email']);

				if ($user) {
					$newPassword = $this->getService('ClientService')->generateRandomString();
					$this->set('password', $newPassword);
					$this->set('user', $user);
					$hash = md5(md5(time()));
					$this->set('hash', $hash);
					$content = $this->render('../Emails/changePassword');

					$email = $this->getService('EmailService')->sendEmail($user['Client']['email'], $content->body());
					if ($email) {
						$this->Session->setFlash('Email enviado com sucesso!', '', array(), 'changePassword-success');
						$user['Client']['password'] = $newPassword;
						$user['Client']['token'] = $hash;
						if (!$this->Client->save($user)) {
							$this->Session->setFlash('Nova senha não foi salva!', '', array(), 'changePassword-error');
						}
					} else {
						$this->Session->setFlash('Email não enviado. Tente novamente!', '', array(), 'changePassword-error');
					}
				} else {
					$this->Session->setFlash('Email não foi encontrado. Tente novamente!', '', array(), 'changePassword-error');
				}
			}
		}

		return $this->redirect(array('controller' => 'clients', 'action' => 'login'));
	}

	public function resetPassword($hash) {
		if ($this->request->is('get')) {
			$client = $this->getRepository('ClientRepository')->findByToken($hash);

			if (!$client) {
				throw new Exception("Token não foi encontrado", 404);
			}
			$this->Session->write('Client.data', $client);
		}

		if ($this->request->is('post')) {
			$client = $this->Session->read('Client.data');
			$checkPasswords = $this->getService('ClientService')->checkPasswords($this->request->data);
			if (!$checkPasswords) {
				$client['Client']['password'] = $this->request->data['Client']['newPassword'];
				if ($this->Client->save($client)) {
					$this->Session->setFlash('Senha alterada com sucesso!', '', array(), 'resetPassword');
					$this->Session->delete('Client.data');
					return $this->redirect(array('controller' => 'clients', 'action' => 'login'));
				}
			}
			$this->Session->setFlash($checkPasswords, '', array(),'error');
		}
	}

	public function login() {
		if($this->request->is('post')) {

			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('Usuário e senha estão incorretos!', '', array(), 'login');
			}
		}
	}

	public function loginToMobile() {
		$this->autoRender = false;
		
		if($this->request->is('post')) {
			$this->request->data['password'] = $this->Client->cryptPassword($this->request->data['password']);
			$client = $this->getRepository('ClientRepository')->login($this->request->data);

			if($client){
				$sells = $this->getRepository('SellRepository')->sellsByClient($client['Client']['id']);
				$sells = $this->getService('ClientService')->prepareDataToMobile($sells);
				return json_encode($sells);
			} else {
				return json_encode('unauthorized');
			}
		}
	}

	public function add() {	
		$states = $this->getRepository('ManufacturerRepository')->getAllStates();
    	$this->set('states', $states);
		$clientService = $this->getService('ClientService');
		
		$words = $this->getRepository('KeyWordRepository')->findAll();
		$this->set('words', $words);

		if ($this->request->is('post')) {

			$data = $clientService->prepareFields($this->request->data);

			if ($clientService->validatePassword($this->request->data)) {
	    		if ($this->Client->save($data)) {
	    			$this->Session->setFlash('Obrigado por se cadastrar, boas compras!');
	    			$this->request->data = array();
	    			return $this->Auth->redirect($this->Auth->redirectUrl());
	    		} else {
					$this->Session->setFlash('Ocorreu um problema ao salvar o cliente. Tente novamente!','',array(),'error');
	    		}
			} else {
				$this->Session->setFlash('Senha não confere com a confirmação','',array(),'error');	
			}
    	}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function edit() {

	}

	public function view() {
		
	}
}