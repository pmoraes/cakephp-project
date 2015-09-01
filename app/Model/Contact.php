<?php

class Contact extends AppModel
{
	
	public $validate = array(
        'name' => array(
        	'rule'       => array('custom', '/^[a-z0-9 ]*$/i'),
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, informe um nome válido'

        ),
        'subject' => array(
        	'rule'       => array('custom', '/^[a-z0-9 ]*$/i'),
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, informe um assunto válido'

        ),
        'email' => array(
        	'rule'       => 'email',
        	'required'   => true,
        	'allowEmpty' => false,
        	'email'      => 'email',
        	'message'    => 'Por favor, Informe um email válido.'
        ),
		'message' => array(
			'rule'       => 'notEmpty',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe uma menssagem válida.'
        )
    );
}