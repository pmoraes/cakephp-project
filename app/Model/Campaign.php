<?php

class Campaign extends AppModel {
	public $hasAndBelongsToMany = array(
        "Product" => array(
            "className" => 'Product',
            "joinTable" => "campaign_products",
            "foreignKey" => "campaign_id",
            "associationForeignKey" => "product_id",
            'unique' => true
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
            'message'    => 'Por favor, Informe o nome da campanha.'

        ),
        'discount' => array(
            'rule'       => 'numeric',
            'required'   => true,
            'allowEmpty' => false,
            'message'    => 'Por favor, Informe o desconto da campanha.'

        ),
        'description' => array(
            'rule'       => 'notEmpty',
            'required'   => true,
            'allowEmpty' => false,
            'message'    => 'Por favor, Informe uma descrição para a campanha.'
        )
    );

    public $actsAs = array(
        'Attach.Upload' => array(
            'image' => array(
                'dir' => 'webroot{DS}uploads{DS}campaigns{DS}image',
                'thumbs' => array(
                    'big' => array(
                        'w' => 360,
                        'h' => 204,
                        'crop' => true,
                    ),
                    'medium' => array(
                        'w' => 190,
                        'h' => 190,
                        'crop' => true,
                    )
                ),
            )
        )
    );

    public function beforeSave($options = array()) {
        $slug = strtolower(Inflector::slug($this->data['Campaign']['name'], '-'));
        $this->data['Campaign']['slug'] = $slug;
    }
}