<?php
class AddedSeenFieldOnContacts extends CakeMigration {

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
				'contacts' => array(
					'seen' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'after' => 'updated'),
				),
			),
		),
		'down' => array(
			'drop_field' => array(
				'contacts' => array('seen',),
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
