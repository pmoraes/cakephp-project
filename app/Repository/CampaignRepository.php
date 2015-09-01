<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class CampaignRepository extends AbstractRepository {

	public function getAllCampaigns($limit = false) {
		if ($limit) {
			$limit = array('limit' => $limit);
		} else {
			$limit = array();
		}

		return $this->getModel()
			->find('all', $limit);
	}

	public function findBySlug($slug) {
		return $this->getModel()
			->find('first', 
				array('conditions' => array(
		    			'Campaign.slug' => $slug
					),
					'recursive' => 2
				)
			);
	}
}