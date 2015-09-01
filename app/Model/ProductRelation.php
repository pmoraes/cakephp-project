<?php

class ProductRelation extends AppModel
{
	public $useTable = "products_relations";
	
	public $belongsTo = array(
		"ProductParent" => array(
			"className" => "Product",
			"foreignKey" => "product_parent_id"
		),
		"ProductChild" => array(
			"className" => "Product",
			"foreignKey" => "product_child_id"
		)
	);
}