<?php 

class HomesController extends AppController
{
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function admin_index() {

		$clients = $this->getRepository('ClientRepository')->getAmountClientsActive();
		
		$totalSold = $this->getRepository('SellRepository')->getTotalSold();
		
		$openSell = $this->getRepository('SellRepository')->getOpenSell();
		
		$messages = $this->getRepository('ContactRepository')->getTotalMessageNotSeen();
		
		$sellByMonth = $this->getRepository('SellRepository')->getTotalSellByMonth();
		$sellByMonth = $this->getService('SellService')->prepareSellsMonthToChart($sellByMonth);

		$sellByWeek = $this->getRepository('SellRepository')->getTotalSellByWeek();
		$sellByWeek = $this->getService('SellService')->prepareSellsWeekToChart($sellByWeek);
		
		$percentage = $this->getRepository('SellRepository')->getTotalPercentageSeller();

		$bestProducts = $this->getRepository('ProductRepository')->bestProductsSold();
		$bestProducts = $this->getService('ProductService')->prepareProductsSold($bestProducts);

		$worstProducts = $this->getRepository('ProductRepository')->worstProductsSold();
		$worstProducts = $this->getService('ProductService')->prepareProductsSold($worstProducts);

		$bestClients = $this->getRepository('ClientRepository')->bestClients();
		$bestClients = $this->getService('ClientService')->prepareClients($bestClients);

		$worstClients = $this->getRepository('ClientRepository')->worstClients();
		$worstClients = $this->getService('ClientService')->prepareClients($worstClients);

		$this->set('messages', $messages);
		$this->set('percentage', $percentage);
		$this->set('clients', $clients);
		$this->set('totalSold', reset($totalSold));
		$this->set('openSell', $openSell);
		$this->set('sellsMonth', $sellByMonth);
		$this->set('sellsWeek', $sellByWeek);
		$this->set('bestProducts', $bestProducts);
		$this->set('worstProducts', $worstProducts);
		$this->set('bestClients', $bestClients);
		$this->set('worstClients', $worstClients);
	}

	public function index() {
		
	}
}