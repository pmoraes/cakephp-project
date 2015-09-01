<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class PromotionalCodeRepository extends AbstractRepository {

	public function getAllPromotionalCode() {
		return $this->getModel()
			->find('all');
	}

	public function checkCode($code) {
		return $this->getModel()
			->find('first',array(	
				"joins" => array(
					array(
						"table" => "promotional_code_clients",
						"alias" => "Client",
						"type"  => "inner",
						"conditions" => array(
							"Client.client_id" => CakeSession::read('Auth.User.id'),
							"PromotionalCode.id = Client.promotional_code_id"
						)
					)
				),
				"conditions" => array(
					"PromotionalCode.code" => $code,
					"PromotionalCode.validate >= " => date('Y-m-d'),
					"PromotionalCode.active" => 1
				),
				"recursive" => 0
			)
		);

	}
}