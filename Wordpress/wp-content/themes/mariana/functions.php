<?php

/**
 * Template: Functions.php 
 */

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
require_once get_template_directory() . '/core/classes/class-contact-form.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/classes/class-metabox.php';
require_once get_template_directory() . '/core/helpers.php';

/**
 * Theme customization
 **/
//require_once get_template_directory() . '/lib/themeOptions.php';
//require_once get_template_directory() . '/lib/paginate.php';
require_once get_template_directory() . '/lib/custom-footer.php';

// Removing the admin bar
add_filter('show_admin_bar', '__return_false');

register_nav_menu( "Primary", "Menu" ); // Register the menu once

// Thumbnail support
add_theme_support('post-thumbnails', array('post', 'page', 'lookbook'));
add_theme_support('widgets');

if ( function_exists('register_sidebar') ) {
	register_sidebar(
		array(
			'name' => 'Formulário Contato',
			'id' => 'contact-form',
		)
	);
}

function remove_menus(){
	remove_menu_page('upload.php'); //Media
	remove_menu_page('edit-comments.php'); //Comments
	// remove_menu_page('edit.php'); //Posts
	remove_menu_page('plugins.php'); //Plugins
	// remove_menu_page('users.php'); //Users
	remove_menu_page('tools.php'); //Tools
	// remove_menu_page('themes.php'); //Appearence
	remove_menu_page('options-general.php'); //Settings
	remove_menu_page('link-manager.php'); //Settings
}
 
add_action('admin_menu', 'remove_menus');