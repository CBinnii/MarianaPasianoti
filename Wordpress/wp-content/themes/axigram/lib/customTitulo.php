<?php

$page_title = new Odin_Metabox(
	'page_title', 
	'Imagem para Título',
	'page'
);

$page_title->set_fields(
	array(
		array(
			'id'		=>	'image_titulo',
			'label'		=>	__( 'Imagem', 'odin' ),
			'type'		=>	'image'
		)
	)
);