<?php

class Manufacturer extends AppModel {
	public $belongsTo = array(
		'City'
	);

    public $hasMany = array(
        "Product"
    );

	public $validate = array(
        'social_reason' => array(
        	'rule'       => 'alphaNumeric',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe o nome da razão social.'
        )
    );
}