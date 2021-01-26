<?php

$odin_theme_options = new Odin_Theme_Options( 
	'theme-options', // Slug/ID da página (Obrigatório)
	__( 'Theme Options', 'odin' ) // Titulo da página (Obrigatório)
);

$odin_theme_options->set_tabs(
	array(
		array(
			'id'	=>	'contact_options',
			'title'	=>	__( 'Texto footer', 'odin' )
		)
	)
);

$odin_theme_options->set_fields(
	array(
		'atendimento' => array(
			'tab'   => 'contact_options',
			'title' => __( 'Horário de Atendimento', 'odin' ),
			'fields' => array(
				array(
					'id' => 'sobre',
					'label' => __( 'Texto:', 'odin' ),
					'type' => 'editor'
				),
				array(
					'id'		=>	'horarios',
					'label'		=>	__( 'Horários', 'odin' ),
					'type'		=>	'editor'
				)
			)
		)
	)
);