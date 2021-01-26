<?php
	
function paginatorNews($query)
{
	$content = '';
	$big = 999999999;
	if ($query->max_num_pages < 1)
		$content .= '<li><a href="#">1</a></li>';
		$content.= paginate_links(array(
			'base'		=>	str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format'	=>	'?paged=%#%',
			'current'	=>	max(1, get_query_var('paged')),
			'type'		=>	'list',
			'prev_next'	=>	true,
			'prev_text'	=>	__('&laquo;'),
			'next_text'	=>	__('&raquo;'),
			'add_args' => array('class' => 'pagination'),
			'total'		=>	$query->max_num_pages
		));
	$content = str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $content );
	return $content;
}