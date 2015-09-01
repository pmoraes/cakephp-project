<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class SliderRepository extends AbstractRepository {
	
	public function getAllSliders() {
		return $this->getModel()
			->find('all');
	}	
}