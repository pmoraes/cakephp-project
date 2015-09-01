<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class KeyWordRepository extends AbstractRepository {

	public function findAll() {
		return $this->getModel()
			->find('list');
	}
}