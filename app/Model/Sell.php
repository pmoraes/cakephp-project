<?php

class Sell extends AppModel
{
	public $belongsTo = array(
		"StatusSell",
        "Client"
	);

	public $hasAndBelongsToMany = array(
        "Product" => array(
            "className" => 'Product',
            "joinTable" => "sell_products",
            "foreignKey" => "sell_id",
            "associationForeignKey" => "product_id",
            'unique' => true
        )
    );
}