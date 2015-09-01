<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class CityRepository extends AbstractRepository {

	public function getCitiesByStateId($id) {
		return $this->getModel()
			->find("all", 
				array(
					"conditions" => array(
						array("state_id" => $id)
					),
					"recursive" => -1
				)
			);

	}
}