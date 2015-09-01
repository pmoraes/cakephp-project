<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class ManufacturerRepository extends AbstractRepository {

	public function getAllManufacturers() {
		return $this->getModel()
			->find('all');
	}

	public function getAllStates() {
		return $this->getModel()
			->City
			->State
			->find('list');
	}

	public function getListManufacturers() {
		return $this->getModel()
			->find('list', 
				array(
					"conditions" => array(
						"active" => 1
					),
					"fields" =>array(
						"id", "fantasy_name"
					)
				)
			);
	}
}