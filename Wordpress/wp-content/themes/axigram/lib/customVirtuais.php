<?php

	$virtual = new Odin_Post_Type('Lojas Virtuai','lojas-virtuais');

	$virtual->set_labels(
		array(
			'menu_name' => __('Lojas Virtuais', 'odin')
		)
	);

	$virtual->set_arguments(
		array(
			'supports' => array('title')
		)
	);

	$virtual_opcao = new Odin_Metabox(
		'lojas-virtuais', 
		'Lojas Virtuai',
		'lojas-virtuais', 
		'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
		'high' // Prioridade (opções: high, core, default ou low) (opcional)
	);

	$virtual_opcao->set_fields(
		array(
			array(
				'id' 			=> 'website',
				'label' 		=> __( 'WebSite', 'odin' ),
				'type'			=> 'text',
				'attributes' 	=> array( 'placeholder' => 'drogaria.com.br'),// Opcional
				'description' 	=> __( 'Não use: http:// ou www. Ex.: drogaria.com.br', 'odin' ),
			)
		)
	);