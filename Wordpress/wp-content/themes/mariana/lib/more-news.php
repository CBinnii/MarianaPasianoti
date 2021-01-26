<?php

function infinite_scroll(){ 

	$args = array(
		'post_type'		 => 'post',
		'paged'    		 => $_POST['pageNo'],
		'posts_per_page' => $_POST['postPerPage']
	);

	$the_query = new WP_Query( $args );

	$data = [];

	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();

			$post_author = get_post_field( 'post_author', get_the_ID() );
			$the_date = date('M j, Y ', strtotime(get_the_date()));
			$post_author = get_post_field( 'post_author', get_the_ID() );

			$data[] = array(
				'title' 	=> html_entity_decode( get_the_title() ),
				'exc' 		=> html_entity_decode( get_the_excerpt() ),
				'thumbnail' => wp_get_attachment_url(get_post_thumbnail_id(), 'full'),
				'link' 		=> get_permalink(),
				'author'	=> get_the_author_meta( 'display_name', $post_author ) ,
				'the_date'	=> $the_date
			);

		endwhile;
	endif;

	// Reset Query
	wp_reset_postdata();

	echo json_encode($data);
		
	die();
}

add_action( 'wp_ajax_infinite_scroll', 'infinite_scroll' );
add_action( 'wp_ajax_nopriv_infinite_scroll', 'infinite_scroll' );
