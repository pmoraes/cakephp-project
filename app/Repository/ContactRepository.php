<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class ContactRepository extends AbstractRepository {

	public function getContactsSent() {
		return $this->getModel()
			->find('all');
	}

	public function getTotalMessageNotSeen() {
		return $this->getModel()
			->find('count',
				array(
					"conditions" => array('Contact.seen' => false)
				)
			);

	}
}