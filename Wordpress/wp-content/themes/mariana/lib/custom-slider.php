<?php

//Criação do custom post
$slider = new Odin_Post_Type('Home Slider', 'slider_home');

$slider->set_labels(
	array(
		'menu_name' => __( 'Home Slider', 'odin' ),
		'name' => __( 'Home Slider', 'odin' ),
		'add_new_item' =>  __( 'Add New Home Slider', 'odin' ),
		'new_item' =>  __( 'Add New', 'odin' ),
		'add_new' => __('Add New', 'odin'),
		'all_items' => __('All Sliders', 'odin'),
	)
);

$slider->set_arguments(
	array(
		'supports' => array( 'title', 'thumbnail')
	)
);

//Campos personalizados
$meta_slider = new Odin_Metabox(
	'meta_slider',
	'Home Slider',
	'slider_home'
);

$meta_slider->set_fields(
	array(
		array(
			'id'		=> 'description',
			'label'		=> __( 'Description', 'odin' ),
			'type'		=> 'textarea',
		),
		array(
			'id'		=> 'image',
			'label'		=> __( 'Slider Image', 'odin' ),
			'type'		=> 'image',
		)
	)
);
