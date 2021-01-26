<?php
	$produto = new Odin_Post_Type('Produto','produto');

	$produto->set_labels(
		array(
			'menu_name' => __('Produto', 'odin')
		)
	);

	$produto->set_arguments(
		array(
			'supports' => array('title')
		)
	);

	$produto_opcao = new Odin_Metabox(
		'produtos', 
		'Opções de Produto',
		'produto', 
		'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
		'high' // Prioridade (opções: high, core, default ou low) (opcional)
	);

	$produto_opcao->set_fields(
		array(
			array(
				'id'		=>	'image_produto',
				'label'		=>	__( 'Imagem', 'odin' ),
				'type'		=>	'image'
			),
			array(
				'id'		=>	'link_produto',
				'label'		=>	__( 'Link compra', 'odin' ),
				'type'		=>	'text'
			),
			array(
				'id'		=>	'descricao_produto',
				'label'		=>	__('Descrição', 'odin'),
				'type'		=>	'editor'
			)
		)
	);