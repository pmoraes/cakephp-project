<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class ClientRepository extends AbstractRepository {

	public function getAmountClientsActive() {
		return $this->getModel()
			->find('count',
				array(
					"conditions" => array('Client.active' => 1)
				)
			);

	}

	public function getListClients() {
		$this->getModel()->virtualFields = array('full_name' => 'CONCAT(first_name, " ", last_name)');

		return $this->getModel()
			->find('list', array(
					"conditions" => array(
						"Client.active" => 1
					),
					"fields" => array(
						"full_name"
					)
				)
			);
	}

	public function getClientsById($clients) {
		return $this->getModel()
			->find('all', array(
					"conditions" => array(
						"Client.id IN" => $clients
					),
					"recursive" => -1
				)
			);
	}

	public function findById() {
		return $this->getModel()
			->find('first',array(
				'conditions' => array(
					'Client.id' => CakeSession::read('Auth.User.id')
				),
				'recursive' => 2
			)
		);
	}

	public function findByEmail($email) {
		return $this->getModel()
			->find('first', 
				array(
					"conditions" => array(
						"Client.email" => $email
					),
					"recursive" => -1
				)
			);
	}

	public function login($data) {
		return $this->getModel()
			->find('first', 
				array(
					"conditions" => array(
						"Client.email" => $data['email'],
						"Client.password" => $data['password']
					),
					"recursive" => -1
				)
			);	
	}

	public function bestClients() {
		$this->getModel()->virtualFields = array(
        	'name' => 'CONCAT(Client.first_name, " ", Client.last_name)'
    	);
    	
		return $this->getModel()
			->find('all', array(
				"fields" => array(
					'count(Client.id) total', 
					"name"
				),
				"joins" => array(
					array(
						'table'=>'sells',
						'alias'=>'s',
						'type'=>'inner',
						'conditions' => array(
							'Client.id = s.client_id'
						)	
					)
				),
				"group" => "(s.client_id)",
				"order" => "total desc",
				"recursive" => -1,
				"limit" => 5
			)
		);
	}

	public function worstClients () {
		$this->getModel()->virtualFields = array(
        	'name' => 'CONCAT(Client.first_name, " ", Client.last_name)'
    	);

		return $this->getModel()
			->find('all', array(
				"fields" => array(
					'count(Client.id) total', 
					"name"
				),
				"joins" => array(
					array(
						'table'=>'sells',
						'alias'=>'s',
						'type'=>'inner',
						'conditions' => array(
							'Client.id = s.client_id'
						)	
					)
				),
				"group" => "(s.client_id)",
				"order" => "total asc",
				"recursive" => -1,
				"limit" => 5
			)
		);
	}
}