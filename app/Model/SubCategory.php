<?php

class SubCategory extends AppModel {
	public $belongsTo = array(
		'Category'
	);

    public $hasMany = array(
        "Product"
    );

	public $validate = array(
        'name' => array(
        	'rule'       => array('minLength', 3),
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, informe um nome válido'

        ),
        'category_id' => array(
        	'rule'       => 'numeric',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe a categoria.'
        )
    );

    public function beforeSave($options = array()) {
        $slug = strtolower(Inflector::slug($this->data['SubCategory']['name'], '-'));
        $this->data['SubCategory']['slug'] = $slug;
    }
}