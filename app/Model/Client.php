<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Client extends AppModel {
	public $belongsTo = array(
		"City"
	);

    public $hasMany = array(
        "Sell"
    );

    public $hasAndBelongsToMany = array(
        "Product" => array(
            "className" => 'Product',
            "joinTable" => "client_products",
            "foreignKey" => "client_id",
            "associationForeignKey" => "product_id",
            'unique' => true
        ),
        "PromotionalCode" => array(
            "className" => 'PromotionalCode',
            "joinTable" => "promotional_code_clients",
            "foreignKey" => "client_id",
            "associationForeignKey" => "promotional_code_id",
            'unique' => true
        )
    );

	public function beforeSave($options = array()) {
	    if (isset($this->data['Client']['password'])) {
	        $passwordHasher = new SimplePasswordHasher();
	        $this->data['Client']['password'] = $passwordHasher->hash(
	            $this->data['Client']['password']
	        );
	    }
    	
    	return true;
	}

    public function cryptPassword($password) {
        $passwordHasher = new SimplePasswordHasher();
        return $passwordHasher->hash($password);
    }

	public $validate = array(
        'first_name' => array(
        	'rule'       => array('minLength', 3),
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, informe um nome válido'

        ),
        'last_name' => array(
        	'rule'       => array('minLength', 3),
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, informe um sobrenome válido'

        ),
        'email' => array(
        	'rule'       => 'email',
        	'required'   => true,
        	'allowEmpty' => false,
        	'email'      => 'email',
        	'message'    => 'Por favor, Informe um email válido.'
        ),
		'first_contact' => array(
			'rule'       => 'numeric',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe um contato válido.'
        ),
        'address' => array(
 			'rule'       => array('minLength', 3),
 			'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe um endereço válido.'
        ),
        'neighborhood' => array(
        	'rule'       => 'notEmpty',
 			'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe um bairro válido.'
        ),
        'number' => array(
        	'rule'       => 'notEmpty',
 			'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe um número válido.'
        ),
        'cep' => array(
            'rule'       => 'numeric',
            'required'   => true,
            'allowEmpty' => false,
            'message'    => 'Por favor, Informe um cep válido.'
        ),
        'complement' => array(
        	'rule'       => array('minLength', 3),
 			'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe um complemento válido.'
        ),
        'city_id' => array(
        	'rule'       => 'numeric',
 			'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe uma cidade válida.'
        ),
        'password' => array(
        	'rule'       => array('minLength', 6),
 			'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe uma senha com no minimo 6 caracteres.'
        ),
        'term' => array(
            'notEmpty' => array(
                'rule'     => array('comparison', '==', 'on'),
                'required' => true,
                'message'  => 'Para se cadastrar você precisar concordar com os termos.'
            )
        )
    );
}