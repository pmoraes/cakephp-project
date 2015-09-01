<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'homes', 'action' => 'index', 'home'));
	Router::connect(
		'/produtos/:subCategory/:slug', 
		array('controller' => 'products', 'action' => 'view'),
		array(
			'slug' => '[a-z0-9-]+',
			'pass' => array(
				'subCategory',
				'slug'
			)
		)
	);

	Router::connect(
		'/lista-de-desejos/item/delete/:id', 
		array('controller' => 'clients', 'action' => 'deleteItem'),
		array(
			'id' => '[0-9-]+' ,
			'pass' => array(
				'id'
			)
		)
	);

	Router::connect(
		'/carrinho-de-compra/item/delete/:id', 
		array('controller' => 'clients', 'action' => 'removeCart'),
		array(
			'id' => '[0-9-]+' ,
			'pass' => array(
				'id'
			)
		)
	);
	
	Router::parseExtensions('json');
	Router::connect(
		'/carrinho-de-compra/add/item/:id', 
		array('controller' => 'clients', 'action' => 'addCart'),
		array(
			'id' => '[0-9-]+' ,
			'pass' => array(
				'id'
			)
		)
	);

	Router::connect(
		'/contato', 
		array('controller' => 'contacts', 'action' => 'add')
	);

	Router::connect(
		'/carrinho-de-compra', 
		array('controller' => 'clients', 'action' => 'cart')
	);

	Router::connect(
		'/lista-de-desejos', 
		array('controller' => 'clients', 'action' => 'wishList')
	);

	Router::connect(
		'/login', 
		array('controller' => 'clients', 'action' => 'login')
	);

	Router::connect(
		'/logout', 
		array('controller' => 'clients', 'action' => 'logout')
	);

	Router::connect(
		'/cadastro-de-clientes', 
		array('controller' => 'clients', 'action' => 'add')
	);

	Router::connect(
		'/minha-conta', 
		array('controller' => 'clients', 'action' => 'myAccount')
	);

	Router::connect(
		'/products/index/:subCategorySlug', 
		array('controller' => 'products', 'action' => 'index'),
		array(
			'subCategorySlug' => '[a-z0-9-]+',
			'pass' => array(
				'subCategorySlug'
			)
		)
	);

	Router::parseExtensions('json');
	Router::connect(
		'/subCategories/getSubCategories/:id', 
		array('controller' => 'subCategories', 'action' => 'getSubCategories'),
		array(
			'id' => '[a-z0-9-]+',
			'pass' => array(
				'id'
			)
		)
	);

	Router::parseExtensions('json');
	Router::connect(
		'/clients/addWishList/:id', 
		array('controller' => 'clients', 'action' => 'addWishList'),
		array(
			'id' => '[0-9-]+',
			'pass' => array(
				'id'
			)
		)
	);


	Router::connect(
		'/campaigns/view/:slug', 
		array('controller' => 'campaigns', 'action' => 'view'),
		array(
			'slug' => '[a-z0-9-]+',
			'pass' => array(
				'slug'
			)
		)
	);

	Router::connect(
		'/clients/resetPassword/:hash', 
		array('controller' => 'clients', 'action' => 'resetPassword'),
		array(
			'hash' => '[a-z0-9-]+',
			'pass' => array(
				'hash'
			)
		)
	);

	Router::connect(
		'/finalizar-compra', 
		array('controller' => 'sells', 'action' => 'checkout')
	);
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect(
	    '/admin',
    	array('controller' => 'users', 'action' => 'login', 'admin' => true)
	);


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
