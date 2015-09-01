<?php
class ChangeTheFieldsOnProducts extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'products_relations' => array(
					'product_child_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index', 'after' => 'product_parent_id'),
					'indexes' => array(
						'fk_products' => array('column' => 'product_child_id', 'unique' => 0),
					),
				),
			),
			'drop_field' => array(
				'products_relations' => array('product_id', 'indexes' => array('fk_products')),
			),
		),
		'down' => array(
			'drop_field' => array(
				'products_relations' => array('product_child_id', 'indexes' => array('fk_products')),
			),
			'create_field' => array(
				'products_relations' => array(
					'product_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
					'indexes' => array(
						'fk_products' => array(),
					),
				),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 */
	public function after($direction) {
		return true;
	}
}
