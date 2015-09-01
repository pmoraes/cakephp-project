<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class SubCategoryRepository extends AbstractRepository {
	public function getAllCategories() {
		return $this->getModel()
			->Category
			->find("list", 
				array("conditions" => 
					array("active" => 1)
				)
			);
	}

	public function getAllSubCategories() {
		return $this->getModel()
			->find('all');
	}

	public function getSubCategoriesByCategoryId($id) {
		return $this->getModel()
			->find("all", 
				array(
					"conditions" => array(
						array("category_id" => $id)
					),
					"recursive" => -1
				)
			);
	}
}