<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		"DebugKit.Toolbar",
		"Auth",
		"Session",
		"ServiceContainer.ServiceContainer",
		"PagSeguro.Carrinho"
	);

	public function beforeFilter() {
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
        	$this->layout = 'admin';
    	
			$this->Auth->loginRedirect = array(
				"controller" => "homes",
				"action"     => "admin_index"
			);
			$this->Auth->userScope = array('User.verified' => '1');
    	} else {
    		$this->Auth->loginAction = "/login";

    		$this->Auth->authenticate = array(
			    'Form' => array(
		    		'userModel' => 'Client',
		    		'fields' => array(
			    		'username' => 'email',
						'password' => 'password'
		    		)
		    	)
			);

			$this->Auth->logoutRedirect = '/';
    	}
	}

	public function getService($name) {
		return $this->ServiceContainer->get($name);
	}

	public function getRepository($name) {
		return $this->ServiceContainer->get($name);
	}
}