<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class CategoryRepository extends AbstractRepository {

	public function getAllCategories() {
		return $this->getModel()
			->find('all');
	}
}