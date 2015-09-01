<?php

class CitiesController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('getCitiesByState');
	}

    public function getCitiesByState($id) {
        $this->autoRender = false;
        if(!$id) {
            throw new Exception("Id cannot be null!");
        }

        $cities = $this->getRepository("CityRepository")->getCitiesByStateId($id);

        return json_encode($cities);
    }
}