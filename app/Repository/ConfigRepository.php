<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class ConfigRepository extends AbstractRepository {

	public function getAllConfigs() {
		return $this->getModel()
			->find('all');
	}
}