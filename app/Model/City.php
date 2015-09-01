<?php

class City extends AppModel {
	public $belongsTo = array(
		"State"
	);
}