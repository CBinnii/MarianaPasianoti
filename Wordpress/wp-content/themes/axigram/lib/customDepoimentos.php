<?php
	$Treino = new Odin_Post_Type('Depoimentos','depoimentos');

	$Treino->set_labels(
		array(
			'menu_name' => __('Depoimentos', 'odin')
		)
	);

	$Treino->set_arguments(
		array(
			'supports' => array('title')
		)
	);

	$Treino_opcao = new Odin_Metabox(
		'Depoimentos', 
		'Opções de Depoimentos',
		'depoimentos', 
		'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
		'high' // Prioridade (opções: high, core, default ou low) (opcional)
	);

	$Treino_opcao->set_fields(
		array(
			array(
				'id'		=>	'image_depoimento',
				'label'		=>	__( 'Imagem', 'odin' ),
				'type'		=>	'image'
			),
			array(
				'id'		=>	'extern_link',
				'label'		=>	__('Link Externo', 'odin'),
				'type'		=>	'text'
			),
			array(
				'id'		=>	'descricao_depoimento',
				'label'		=>	__('Descrição', 'odin'),
				'type'		=>	'editor'
			),
			array(
				'id'		=>	'video_depoimento',
				'label'		=>	__('Video Depoimento', 'odin'),
				'type'		=>	'textarea'
			)
		)
	);