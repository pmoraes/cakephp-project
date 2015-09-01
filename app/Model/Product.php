<?php

class Product extends AppModel {
	public $belongsTo = array(
		'SubCategory',
        'Manufacturer'
	);
    public $name = "Product";

    public $hasAndBelongsToMany = array(
        'ProductRelation' => array(
            'className'  => 'Product', 
            'joinTable'  => 'products_relations', 
            'foreignKey' => 'product_parent_id', 
            'associationForeignKey' => 'product_child_id',
            'with' => 'ProductsRelations'
        ),
        "Campaign" => array(
            "className" => 'Campaign',
            "joinTable" => "campaign_products",
            "foreignKey" => "product_id",
            "associationForeignKey" => "campaign_id"
        ),
        "Sell" => array(
            "className" => 'Sell',
            "joinTable" => "sell_products",
            "foreignKey" => "product_id",
            "associationForeignKey" => "sell_id"
        ),
        "Client" => array(
            "className" => 'Client',
            "joinTable" => "client_products",
            "foreignKey" => "product_id",
            "associationForeignKey" => "client_id"
        )
    );

	public $validate = array(
        'image' => array(
            'extension' => array(
                'rule' => array(
                    'extension', array(
                        'jpg',
                        'jpeg',
                        'png',
                    )
                ),
                'message' => 'A extensão da imagem não é válida.',
                'on' => 'create'
            ),
            'mime' => array(
                'rule' => array('mime', array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png'
                )),
                'on' => 'create'
            ),
            'size' => array(
                'rule' => array('size', 2097152),
                'on' => 'create'
            )
        ),
        'name' => array(
            'rule'       => 'notEmpty',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe o nome do produto.'

        ),
        'price' => array(
        	'rule'       => 'numeric',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe o preço do produto.'

        ),
        'description' => array(
            'rule'       => 'notEmpty',
            'required'   => true,
            'allowEmpty' => false,
            'message'    => 'Por favor, Informe uma descrição para o produto.'
        )
    );

    public $actsAs = array(
        'Attach.Upload' => array(
            'image' => array(
                'dir' => 'webroot{DS}uploads{DS}products{DS}image',
                'thumbs' => array(
                    'big' => array(
                        'w' => 800,
                        'h' => 900,
                        'crop' => true,
                    ),
                    'small' => array(
                        'w' => 40,
                        'h' => 36,
                        'crop' => true,
                    ),
                    'medium' => array(
                        'w' => 231,
                        'h' => 130,
                        'crop' => true,
                    ),
                    'smallMedium' => array(
                        'w' => 137,
                        'h' => 91,
                        'crop' => true,  
                    )
                )
            )
        )
    );

    public function beforeSave($options = array()) {
        $slug = strtolower(Inflector::slug($this->data['Product']['name'], '-'));
        $this->data['Product']['slug'] = $slug;
    }
}