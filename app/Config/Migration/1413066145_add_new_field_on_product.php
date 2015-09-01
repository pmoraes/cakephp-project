<?php
class AddNewFieldOnProduct extends CakeMigration {

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
				'products' => array(
					'old_price' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false, 'after' => 'slug'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'products' => array('old_price',),
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
