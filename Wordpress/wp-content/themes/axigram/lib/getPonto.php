<?php

function getPonto(){ 

	$marks = array();
	$index = 0;

	$args = array(
		'post_type' => 'venda',
		'p'			=> $_POST['id'],
		'status' 	=> 'publish'
	);

	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
				$localization = get_post_meta( get_the_ID(), 'localization', true );

				$data[] = array(
					'title' => get_the_title(),
					'address' => get_post_meta( get_the_ID(), 'address', true ),
					'localization' => explode(",", $localization),
					'state' => get_post_meta( get_the_ID(), 'estates', true ),
					'city' => get_post_meta( get_the_ID(), 'city', true ),
					'phone' => get_post_meta( get_the_ID(), 'phone', true ),
					'website' => get_post_meta( get_the_ID(), 'website', true ),
				);
		endwhile;
	endif;
	wp_reset_query();;

	echo json_encode($data);
		
	die();
}

add_action( 'wp_ajax_getPonto', 'getPonto' );
add_action( 'wp_ajax_nopriv_getPonto', 'getPonto' );
