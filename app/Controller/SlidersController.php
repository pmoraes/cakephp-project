<?php

class SlidersController extends AppController
{
	public function beforeFilter() {
		parent::beforeFilter();

		$this->Auth->allow('sliders');
	}

	public function admin_index() {
		$sliders = $this->getRepository('SliderRepository')->getAllSliders();

		$this->set('sliders', $sliders);
	}

	public function admin_add() {

		if ($this->request->is('post')) {
			if ($this->Slider->save($this->request->data)) {
				$this->Session->setFlash('Slider cadastrado com sucesso!');
				return $this->redirect(array('controller' => 'sliders', 'action' => 'add'));
			}
			$this->Session->setFlash('Ocorreu um erro ao salvar o slider. Tente Novamente!', '', array(), 'error');
		}
	}

	public function admin_edit($id = null) {
        $this->Slider->id = $id;

        if(!$this->Slider->exists()) {
            throw new NotFoundException("Slider not found!");
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if($this->Slider->save($this->request->data)) {
                $this->Session->setFlash('Slider foi salvo com sucesso!');
                return $this->redirect(array('controller' => 'sliders', 'action' => 'index'));
            }

            $this->Session->setFlash('Ocorreu um problema ao salvar o slider. Tente novamente!','edit',array(),'error');

        } else {

            $this->request->data = $this->Slider->findById($id);
        }
	}

	public function admin_delete($id = null) {
        $this->autoRender = null;
        $this->Slider->id = $id;

        if(!$this->Slider->exists()) {
            throw new NotFoundException("Slider not found!");
        }
            
        if($this->Slider->delete($this->request->data)) {
            $this->Session->setFlash('Slider '. $this->request->data['Slider']['name'] . "foi deletado com sucesso!");
            return $this->redirect(array('controller' => 'sliders', 'action' => 'index'));
        }

        $this->Session->setFlash('Não foi possível deletar o sliders, tente novamente.','',array(),'error');
        return $this->redirect(array('controller' => 'sliders', 'action' => 'index'));
	}

	public function sliders() {
        $this->autoRender = 0;
        $memcache = $this->getService('MemcacheService');
        $response = $memcache->get('sliders');

        if (!$response) {
            $sliders = $this->getRepository('SliderRepository')->getAllSliders();

			$this->set('sliders', $sliders);
            $response = $this->render('../Elements/website/Navigation/sliders');

            $response = $response->body();

            $memcache->set('sliders',$response, 5*60);
        }

        return $response;
    }

}
