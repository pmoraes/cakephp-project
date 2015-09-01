<?php

class PromotionalCode extends AppModel
{
	public $hasAndBelongsToMany = array(
		"Client" => array(
            "className" => 'Client',
            "joinTable" => "promotional_code_clients",
            "foreignKey" => "promotional_code_id",
            "associationForeignKey" => "client_id"
        )
	);
}