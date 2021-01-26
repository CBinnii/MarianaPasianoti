<?php

$odin_theme_options = new Odin_Theme_Options( 
    'footer-option', // Slug/ID da página (Obrigatório)
    __( 'Meus dados', 'odin' ) // Titulo da página (Obrigatório)
);

$odin_theme_options->set_tabs(
	array(
		array(
			'id'    => 'link_social',
			'title' => __( 'Social Links', 'odin' ),
		)
	)
);

$odin_theme_options->set_fields(
	array(
		'config_social' => array(
			'tab'   => 'link_social',
			'title' => __( 'Social Links', 'odin' ),
			'fields' => array(
				array(
					'id' => 'about',
					'label' => __( 'Meus Dados', 'odin' ),
					'type' => 'editor'
				),
				array(
					'id' => 'horario',
					'label' => __( 'Horario de Atendimento', 'odin' ),
					'type' => 'editor'
				),
				array(
					'id' => 'facebook',
					'label' => __( 'Facebook URL:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'youtube',
					'label' => __( 'YouTube URL:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'twitter',
					'label' => __( 'Twitter URL:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'instagram',
					'label' => __( 'Instagram URL:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'linkedin',
					'label' => __( 'Linked In', 'odin' ),
					'type' => 'text'
				)
			)
		)
	)
);