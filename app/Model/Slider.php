<?php

class Slider extends AppModel
{
	public $validate = array(
        'image' => array(
            'extension' => array(
                'rule' => array(
                    'extension', array(
                        'jpg',
                        'jpeg',
                        'png',
                    )
                ),
                'message' => 'A extensão da imagem não é válida.',
                'on' => 'create'
            ),
            'mime' => array(
                'rule' => array('mime', array(
                    'image/jpeg',
                    'image/pjpeg',
                    'image/png'
                )),
                'on' => 'create'
            ),
            'size' => array(
                'rule' => array('size', 2097152),
                'on' => 'create'
            )
        ),
        'name' => array(
            'rule'       => 'notEmpty',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe o nome do Slider.'

        ),
        'weight' => array(
            'rule'       => 'numeric',
        	'required'   => true,
        	'allowEmpty' => false,
        	'message'    => 'Por favor, Informe o peso do Slider corretamente.'

        )
    );

    public $actsAs = array(
        'Attach.Upload' => array(
            'image' => array(
                'dir' => 'webroot{DS}uploads{DS}sliders{DS}image',
                'thumbs' => array(
                    'big' => array(
                        'w' => 1140,
                        'h' => 552,
                        'crop' => true,
                    )
                )
            )
        )
    );
}