<?php
	$slider = new Odin_Post_Type('Slider','slider');

	$slider->set_labels(
		array(
			'menu_name' => __('Home Slider', 'odin')
		)
	);

	$slider->set_arguments(
		array(
			'supports' => array('title')
		)
	);

	$slider_opcao = new Odin_Metabox(
		'sliders', 
		'Opções do Slider',
		'slider', 
		'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
		'high' // Prioridade (opções: high, core, default ou low) (opcional)
	);

	$slider_opcao->set_fields(
		array(
			array(
				'id'		=>	'imagem_slider',
				'label'		=>	__( 'Imagem', 'odin' ),
				'type'		=>	'image'
			),
			array(
				'id'		=>	'imagem_slider_mobile',
				'label'		=>	__( 'Imagem Mobile', 'odin' ),
				'type'		=>	'image'
			),
			array(
				'id'		=>	'subtitulo_slider',
				'label'		=>	__('Subtítulo', 'odin'),
				'type'		=>	'editor'
			),
			array(
				'id'		=>	'texto_botao',
				'label'		=>	__('Texto do botão', 'odin'),
				'type'		=>	'text'
			),
			array(
				'id'		=>	'link',
				'label'		=>	__('URL', 'odin'),
				'type'		=>	'text'
			)
		)
	);

	/**
	 * @name get_all_posts
	 * @param void
	 * @return Mixed Array
	 * 
	 * */
	function get_all_pages($return_id = '')
	{
		$return = array();
		$query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'showposts' => -1));
		while ($query->have_posts()) : $query->the_post();
			if($return_id == 'id') {
				$return[get_the_id()] = get_the_title();
			}
			else {
				$return[get_permalink()] = get_the_title();
			}
		endwhile;
		wp_reset_query();
		return $return;
	}