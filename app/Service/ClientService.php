<?php 

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class ClientService
{
	public function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }

	    return $randomString;
	}

	public function checkPasswords($data) {
		$passwordHasher = new SimplePasswordHasher();
		$password = $passwordHasher->hash($data['Client']['password']);

		$clientPassword = CakeSession::read('Client.data');
		if ($password != $clientPassword['Client']['password']) {
			return "Senha atual não confere";
		}

		if ($data['Client']['newPassword'] != $data['Client']['confirmNewPassword']) {
			return "Nova senha não confere com a confirmação";
		}

		return false;
	}

	public function validatePassword($data) {
		
		if (isset($data['Client']['password']) && isset($data['Client']['confirmPassword'])) {
			if ($data['Client']['password'] != $data['Client']['confirmPassword']) {
				return false;
			}
		} else {
			return false;
		}

		return true;
	}

	public function writeProductSession($product) {
		$productsSession = CakeSession::read('Cart');

		$new = true;
		if ($productsSession) {
			foreach ($productsSession as $key => $products) {
				if ($products['Product']['id'] == $product['Product']['id']) {
					$productsSession[$key]['length']++;
					$product = $productsSession[$key];
					$new = false;
				}
			}
		}

		if ($new) {
			$key = count($productsSession);	
			$productsSession[$key] = $product;
			$productsSession[$key]['length'] = 1;
			$product = $productsSession[$key];
		}

		CakeSession::write('Cart', $productsSession);

		return $product;
	}

	public function removeItemCart($id) {
		$products = CakeSession::read('Cart');
		foreach ($products as $key => $product) {
			if ($product['Product']['id'] == $id) {
				CakeSession::delete('Cart.'.$key);
			}
		}
	}

	public function prepareClientProductToSave($id) {
		return array(
			"ClientProduct" => array(
				"client_id" => CakeSession::read("Auth.User.id"),
				"product_id" => $id
			)
		);
	}

	public function prepareFields($data) {
		$firstContact = str_replace("(", "", $data["Client"]['first_contact']);
		$firstContact = str_replace(")", "", $firstContact);
		$firstContact = str_replace("-", "", $firstContact);
		$firstContact = str_replace(" ", "", $firstContact);
		$data['Client']['first_contact'] = $firstContact;

		$lastContact = str_replace("(", "", $data["Client"]['last_contact']);
		$lastContact = str_replace(")", "", $lastContact);
		$lastContact = str_replace("-", "", $lastContact);
		$lastContact = str_replace(" ", "", $lastContact);
		$data['Client']['last_contact'] = $lastContact;

		$lastContact = str_replace("-", "", $data["Client"]['cep']);
		$data['Client']['cep'] = $lastContact;

		return $data;
	}

	public function getEmails($clients) {
		$emails = array();
		foreach ($clients as $key => $client) {
			$emails[] = $client['Client']['email'];
		}

		return $emails;
	}

	public function prepareClients($clients) {
		$totalClients = array();

		foreach ($clients as $key => $client) {
			$totalClients[$client['Client']['name']] = (int) $client[0]['total'];
		}
		
		return json_encode($totalClients);
	}

	public function prepareProductsMyAccount($data) {
		$products = array();

		foreach ($data['Product'] as $key => $product) {
			if (array_key_exists($product['id'], $products)) {
				$products[$product['id']][0]['quantity']++;
			} else {
				$products[$product['id']][0] = $product;
				$products[$product['id']][0]['quantity'] = 1;
			}
		}

		$data['Product'] = $products;
		
		return $data;
	}

	public function prepareDataToMobile($data) {
		$sells = array();

		foreach ($data as $key => $value) {
			$sell = array(
				"sell" => array(
					"id"      => $value['Sell']['id'],
					"total"   => number_format($value['Sell']['total'],2,',','.'),
					"created" => $value['Sell']['created'],
					"status"  => $value['StatusSell']['name']
				)
			);

			foreach ($value['Product'] as $key => $product) {
				$sell['products'][] = array(
					"id"    => $product['id'],
					"name"  => $product['name'],			
					"price" => number_format($product['price'],2,',','.')
				);
			}

			$sells[] = $sell;
		}

		return $sells;
	}
}