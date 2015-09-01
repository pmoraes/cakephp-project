<?php

class Category extends AppModel {
	public $hasMany = array(
		"SubCategory"
	);

	public $validate = array(
        'name' => array(
        	'rule'       => 'notEmpty',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe o nome da categoria.'
        )
    );
}