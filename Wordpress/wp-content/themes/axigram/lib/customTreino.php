<?php
	$Treino = new Odin_Post_Type('Treinamento','treino');

	$Treino->set_labels(
		array(
			'menu_name' => __('Treinamento', 'odin')
		)
	);

	$Treino->set_arguments(
		array(
			'supports' => array('title')
		)
	);

	$Treino_opcao = new Odin_Metabox(
		'Treinos', 
		'Opções de Treino',
		'treino', 
		'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
		'high' // Prioridade (opções: high, core, default ou low) (opcional)
	);

	$Treino_opcao->set_fields(
		array(
			array(
				'id'		=>	'datepicker',
				'label'		=>	__('Data Treino', 'odin'),
				'type'		=>	'text'
			),
			array(
				'id'		=>	'descricao_treino',
				'label'		=>	__('Descrição', 'odin'),
				'type'		=>	'editor'
			)
		)
	);