<?php

class CampaignsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('campaigns','view', 'advancedSearch');
    }

	public function admin_index()	{
		$campaigns = $this->getRepository("CampaignRepository")->getAllCampaigns();
		
		$this->set('campaigns', $campaigns);
	}

	public function admin_add() {
        $productRepository = $this->getRepository("ProductRepository");
		$products = $productRepository->getListProducts();

        if ($this->request->is('post')) {
            debug($this->request->data);die;
    		if ($this->Campaign->save($this->request->data)) {
    			$this->Session->setFlash('Campanha foi salva com sucesso!');
                return $this->redirect(array('controller' => 'campaigns', 'action' => 'add'));
            }
     
     		$this->Session->setFlash('Ocorreu um problema ao salvar a campanha. Tente novamente!','',array(),'error');
    	}
    	$this->set('products', $products);
	}

   public function admin_edit($id = null) {
        $productRepository = $this->getRepository("ProductRepository");
        $products = $productRepository->getListProducts();

		$this->Campaign->id = $id;

    	if(!$this->Campaign->exists()) {
    		throw new NotFoundException("Campaign not found!");
    	}

    	if ($this->request->is('post') || $this->request->is('put')) {
    		if($this->Campaign->save($this->request->data)) {
    			$this->Session->setFlash('Campanha salva com sucesso!');
    			return $this->redirect(array('controller' => 'campaigns', 'action' => 'index'));
    		}
    		$this->Session->setFlash('Houve um erro ao salvar a Campanha. Tente Novamente!','edit',array(),'error');
    	} 
    	
    	$this->request->data = $this->Campaign->findById($id);
        $this->set('products', $products);
	}

	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->Campaign->id = $id;

        if(!$this->Campaign->exists()) {
            throw new NotFoundException("Campaign not found!");
        }
            
        if($this->Campaign->delete($this->request->data)) {
            $this->Session->setFlash('Campanha '. $this->request->data['Campaign']['name'] . "foi deletada com sucesso!");
            return $this->redirect(array('controller' => 'campaigns', 'action' => 'index'));
        }

        $this->Session->setFlash('Não foi possível deletar a campanha, tente novamente.','',array(),'error');
        return $this->redirect(array('controller' => 'campanha', 'action' => 'index'));
	}

    public function campaigns() {
        $this->autoRender = 0;
        $memcache = $this->getService('MemcacheService');
        $response = $memcache->get('campaigns');

        if (!$response) {
            $campaigns = $this->getRepository('CampaignRepository')->getAllCampaigns();
            $this->set('campaigns', $campaigns);
            $response = $this->render('campaigns');
            $response = $response->body();

            $memcache->set('campaigns',$response, 5*60);
        }

        return $response;
    }

    public function view($slug) {
        $campaign = $this->getRepository('CampaignRepository')->findBySlug($slug);
        
        if (!$campaign) {
            throw new NotFoundException("Campaign not found!");   
        }

        $this->set('campaign', $campaign);
    }
}