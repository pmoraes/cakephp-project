<?php

App::uses('AbstractRepository', 'Repositories.Lib/Repository/Abstract');

class SellRepository extends AbstractRepository {

	public function getTotalSold() {
		return $this->getModel()
			->find('first',
				array(
					"fields" =>array(
						'sum(Sell.total) AS total'
					)
				)
			);
	}

	public function getOpenSell() {
		return $this->getModel()
			->find('count',
				array(
					"conditions" => array(
						"Sell.status_sell_id = 1"
					)
				)
			);
	}

	public function getTotalSellByMonth() {
		return $this->getModel()
			->find('all', array(
				"fields" => array(
					'Sell.created',
					"sum(total) as total",
				),
				'group' => array('month(Sell.created), year(Sell.created)'),
				'order' => array('Sell.created'),
				'recursive' => -1
			)
		);
	}

	public function getTotalSellByWeek() {
		$previousWeek = strtotime("-1 week +1 day");
		$startWeek = strtotime("last sunday midnight",$previousWeek);
		$endWeek = strtotime("next saturday",$startWeek);

		$startWeek = date("Y-m-d H:i:s",$startWeek);
		$endWeek = date("Y-m-d H:i:s",$endWeek);

		return $this->getModel()
			->find('all', array(
				"conditions" => array(
					'and' => array(
						array(
							'Sell.created >=' => $startWeek,
							'Sell.created <=' => $endWeek
						)
					)
				),
				"fields" => array(
					'Sell.created',
					"sum(total) as total",
				),
				"group" => array('day(Sell.created)'),
				"order" => array('Sell.created'),
				"recursive" => -1
			)
		);
	}

	public function getTotalPercentageSeller() {
		
		$result = $this->query("
			SELECT convert(total * (100 / goal), decimal(4,2)) as percentage FROM
			(SELECT goal goal FROM configs) meta,
			(SELECT sum(total) total FROM sells) total;"
		);

		return reset($result);
	}

	public function sellsByClient($id) {
		return $this->getModeL()
			->find('all', array(
				'conditions' => array(
					'Client.id' => $id
				)
			)
		);
	}

	public function sellByIdAndClient($clientId, $sellId) {
		return $this->getModel()
			->find('first', array(
				'conditions' => array(
					'Client.id' => $clientId,
					'Sell.id' => $sellId
				),
				'recursive' => 2
			)
		);	
	}

	public function getAllSells() {
		return $this->getModel()
			->find('all', array(
				'order' => array('Sell.created')
			)

		);
	}
}