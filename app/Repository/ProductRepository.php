<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class ProductRepository extends AbstractRepository {
	public function getAllCategories() {
		return $this->getModel()
			->SubCategory
			->Category
			->find('list', 
				array("conditions" => 
					array("active" => 1)
				)
			);
	}

	public function getAllProducts() {
		return $this->getModel()
			->find('all');
	}

	public function getListProducts() {
		return $this->getModel()
			->find('list',
				array('conditions' => 
					array('active' => 1)
				)
			);
	}

	public function getProductsHighlights() {
		return $this->getModel()
			->find('all', 
				array("conditions" => 
					array(
						"Product.active" => 1,
						"highlight" => 1
					)
				)
			);	
	}

	public function getProductsPromotions() {
		return $this->getModel()
			->find('all', 
				array("conditions" => 
					array(
						"Product.active" => 1,
						"promotion" => 1
					)
				)
			);	
	}

	public function findById($id) {
		return $this->getModel()
			->find('first', array(
				"conditions" => array(
					"Product.id" => $id
				),
				"recursive" => 0
			)
		);
	}

	public function findBySlug($slug) {
		return $this->getModel()
			->find('first', 
				array('conditions' => 
					array(
						'Product.slug' => $slug
					), 
					'recursive' => 2
				)
			);
	}

	public function findBySubCategorySlug($slug) {
		return $this->getModel()
			->SubCategory
			->find('first', 
				array(
					"conditions" => 
					array(
						"SubCategory.slug" => $slug
					),
					'recursive' => 2
				)
			);
	}

	public function findProductsRelation($productsRelation) {
		return $this->getModel()
			->find('all', array(
					"conditions" => array(
						"Product.id IN" => $productsRelation
					),
					"recursive" => 0
				)
			);	
	}

	public function hasAndIsAvailability($id) {
		return $this->getModel()
			->find('first', array(
				"conditions" => array(
					"Product.id" => $id,
					"Product.availability" => 1
				),
				"recursive" => 1
			)
		);
	}

	public function bestProductsSold() {
		return $this->getModel()
			->find('all', array(
				"fields" => array(
					'count(Product.id) total', 
					'Product.name'
				),
				"joins" => array(
					array(
						'table'=>'sell_products',
						'alias'=>'sp',
						'type'=>'left',
						'conditions' => array(
							'Product.id = sp.product_id'
						)
					),
					array(
						'table'=>'sells',
						'alias'=>'s',
						'type'=>'inner',
						'conditions' => array(
							'sp.sell_id = s.id'
						)	
					)
				),
				"group" => "(sp.product_id)",
				"order" => "total desc",
				"recursive" => -1,
				"limit" => 5
			)
		);
	}

	public function worstProductsSold() {
		return $this->getModel()
			->find('all', array(
				"fields" => array(
					'count(Product.id) total', 
					'Product.name'
				),
				"joins" => array(
					array(
						'table'=>'sell_products',
						'alias'=>'sp',
						'type'=>'left',
						'conditions' => array(
							'Product.id = sp.product_id'
						)
					),
					array(
						'table'=>'sells',
						'alias'=>'s',
						'type'=>'inner',
						'conditions' => array(
							'sp.sell_id = s.id'
						)	
					)
				),
				"group" => "(sp.product_id)",
				"order" => "total ASC",
				"recursive" => -1,
				"limit" => 5
			)
		);
	}

	public function search($search) {
		return $this->getModel()
			->find('all',
				array(
					'conditions' => array(
						'Product.active' => 1,
						'Product.name LIKE' =>	'%'.$search.'%'
					)
				)
			);
	}

	public function getProductsByAdvancedSearch($conditions) {
		return $this->getModel()
			->find('all', 
				array(
					"conditions" => array(
						$conditions
					)
				)
			);
	}
}