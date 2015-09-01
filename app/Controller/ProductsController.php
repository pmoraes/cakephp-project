<?php

class ProductsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('highlights', 'view', 'promotions', 'index', 'search', 'advancedSearch','getHighlightsToMobile', 'getPromotionsToMobile');
    }

	public function admin_index()	{
		$products = $this->getRepository("ProductRepository")->getAllProducts();
		
		$this->set('products', $products);
	}

    public function index($subCategorySlug) {
        $products = $this->getRepository('ProductRepository')->findBySubCategorySlug($subCategorySlug);

        if (!$products) {
            throw new NotFoundException("Products not found!");   
        }

        $this->set('products', $products);
    }

    public function advancedSearch() {
        if ($this->request->is('post')) {
            $data = $this->getService('ProductService')->prepareDataFromAdvancedSearch($this->request->data);
            $products = $this->getRepository('ProductRepository')->getProductsByAdvancedSearch($data);
        } else {
            throw new Exception("Method not found", 500);
        }
        $this->set('products', $products);
        $this->render('/Products/search');
    }

	public function admin_add() {
		$productRepository = $this->getRepository("ProductRepository");
		$categories = $productRepository->getAllCategories();
		
		if ($this->request->is('post')) {
    		if (isset($this->request->data['Product']['price'])) {
    			$this->request->data['Product']['price'] = $this->getService('ProductService')->removeComma($this->request->data['Product']['price']);
    		}
    		
    		if ($productRepository->save($this->request->data)) {
    			$this->Session->setFlash('Produto foi salvo com sucesso!');
    			return $this->redirect(array('controller' => 'products', 'action' => 'add'));
    		}

    		$this->Session->setFlash('Ocorreu um problema ao salvar o produto. Tente novamente!','',array(),'error');
    	} 

        $manufacturers = $this->getRepository("ManufacturerRepository")->getListManufacturers();
        $this->set('manufacturers', $manufacturers);

    	$this->set('categories', $categories);
        $products = $productRepository->getListProducts();
        $this->set('products', $products);
		$this->set('validations', $this->Product->validationErrors);
	}

	public function admin_edit($id = null) {
		$this->Product->id = $id;
        $productRepository = $this->getRepository("ProductRepository");
        $categories = $productRepository->getAllCategories();

        if(!$this->Product->exists()) {
            throw new NotFoundException("Product not found!");
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $product = $this->Product->read();
    		if (isset($this->request->data['Product']['price'])) {
    			$this->request->data['Product']['price'] = $this->getService('ProductService')->removeComma($this->request->data['Product']['price']);
    		}

            if ($product['Product']['price'] < $this->request->data['Product']['price']) {
                $this->request->data['Product']['old_price'] = $product['Product']['price'];
            }

    		if($this->Product->save($this->request->data)) {
    			$this->Session->setFlash('Produto salvo com sucesso!');
    			return $this->redirect(array('controller' => 'products', 'action' => 'index'));
    		}

    		$this->Session->setFlash('Houve um erro ao salvar o Produto. Tente Novamente!','edit',array(),'error');
    	} 
        $this->request->data = $this->Product->findById($id);
        $products = $productRepository->getListProducts();
        $this->set('products', $products);
        $this->set('categories', $categories);
        $manufacturers = $this->getRepository("ManufacturerRepository")->getListManufacturers();
        $this->set('manufacturers', $manufacturers);
	}

	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->Product->id = $id;

        if(!$this->Product->exists()) {
            throw new NotFoundException("Product not found!");
        }
            
        if($this->Product->delete($this->request->data)) {
            $this->Session->setFlash('Produto '. $this->request->data['Product']['name'] . "foi deletado com sucesso!");
            return $this->redirect(array('controller' => 'products', 'action' => 'index'));
        }

        $this->Session->setFlash('Não foi possível deletar o produto, tente novamente.','',array(),'error');
        return $this->redirect(array('controller' => 'products', 'action' => 'index'));
	}

    public function highlights() {
        $this->autoRender = 0;
        $memcache = $this->getService('MemcacheService');
        $response = $memcache->get('highlights');

        if (!$response) {
            $highlights = $this->getRepository('ProductRepository')->getProductsHighlights();
            $this->set('highlights', $highlights);
            $response = $this->render('highlights');
            $response = $response->body();

            $memcache->set('highlights',$response, 5*60);
        }

        return $response;
    }

    public function getPromotionsToMobile() {
        $this->autoRender = 0;
 
        $promotions = $this->getRepository('ProductRepository')->getProductsPromotions();
        $promotions = $this->getService('ProductService')->prepareToMobile($promotions);
 
        return json_encode($promotions);
    }

    public function getHighlightsToMobile() {
        $this->autoRender = 0;
        
        $highlights = $this->getRepository('ProductRepository')->getProductsHighlights();
        $highlights = $this->getService('ProductService')->prepareToMobile($highlights);
        
        return json_encode($highlights);
    }

    public function promotions() {
        $this->autoRender = 0;
        $memcache = $this->getService('MemcacheService');
        $response = $memcache->get('promotions');

        if (!$response) {
            $promotions = $this->getRepository('ProductRepository')->getProductsPromotions();
            $this->set('promotions', $promotions);
            $response = $this->render('promotions');
            $response = $response->body();

            $memcache->set('promotions',$response, 5*60);
        }

        return $response;
    }

    public function view($subCategory, $slug) {
        $productRepository = $this->getRepository('ProductRepository');
        $product = $productRepository->findBySlug($slug);

        $productsRelations = $this->getService('ProductService')->getIdProductRelations($product['ProductRelation']);
        $products = $productRepository->findProductsRelation($productsRelations);

        $product['ProductRelation'] = $products;
        if (!$product) {
            throw new NotFoundException("Product not found!");   
        }
        
        $this->set('product', $product);
    }

    public function search() {
        if (!$this->request->is('post')) {
            throw new Exception("Method not found", 500);
        }

        $products = array();
        if (isset($this->request->data['Product']['search'])) {
            $products = $this->getRepository('ProductRepository')->search($this->request->data['Product']['search']);

        } else {
            return $this->redirect('/');
        }
        
        $this->set('products', $products);
    }
}