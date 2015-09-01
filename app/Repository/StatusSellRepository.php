<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class StatusSellRepository extends AbstractRepository {

	public function getAllStatusSells() {
		return $this->getModel()
			->find('all');
	}

	public function getListStatusSells() {
		return $this->getModel()
			->find('list');
	}
}