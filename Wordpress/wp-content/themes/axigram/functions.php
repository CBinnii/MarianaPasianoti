<?php
/**
 * 
 * Adding Odin Classes
 *
 **/
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-metabox.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';

/**
 * 
 * Adding Custom Post and Custom Field
 *
 **/
require_once get_template_directory() . '/lib/customSlider.php';
require_once get_template_directory() . '/lib/customProduto.php';
require_once get_template_directory() . '/lib/customTreino.php';
require_once get_template_directory() . '/lib/customTitulo.php';
require_once get_template_directory() . '/lib/customVendas.php';
require_once get_template_directory() . '/lib/customVirtuais.php';
require_once get_template_directory() . '/lib/customDepoimentos.php';
require_once get_template_directory() . '/lib/getPonto.php';

/**
 * 
 * Adding Mail Function
 *
 **/
require_once get_template_directory() . '/lib/mailFunction.php';

/**
 * 
 * Theme Options
 *
 **/
require_once get_template_directory() . '/lib/theme-config.php';

/**
 * 
 * Paginate
 *
 **/
require_once get_template_directory() . '/lib/paginate.php';

/**
 * 
 * Options
 *
 **/
show_admin_bar(false);

/**
 *
 * Thumbnail support
 *
 **/
add_theme_support('post-thumbnails', array('post', 'page', 'lookbook'));

/**
 * 
 * Create constantes to especific folders
 *
 **/
define("IMAGES", get_template_directory_uri().'/img/');
define("JS", get_template_directory_uri().'/js/');
define("CSS", get_template_directory_uri().'/css/');

/**
 * 
 * Register and equeue scripts and style
 *
 **/
add_action('wp_enqueue_scripts','register_my_scripts');
function register_my_scripts() {
	wp_register_script('app', JS . 'app.js');
	wp_register_style('style', CSS . 'style.css');

	// wp_enqueue_script('app');
	// wp_enqueue_style('style');
}

register_nav_menu( "Primary", "Menu" ); // Register the menu once

function resume_content( $text, $limit ) {
	return wp_trim_words( $text, $limit );
}

function remove_menus(){
	remove_menu_page('upload.php'); //Media
	remove_menu_page('edit-comments.php'); //Comments
	// remove_menu_page('themes.php'); //Appearance
	remove_menu_page('plugins.php'); //Plugins
	remove_menu_page('users.php'); //Users
	remove_menu_page('tools.php'); //Tools
	// remove_menu_page('options-general.php'); //Settings
}
 
add_action('admin_menu', 'remove_menus');

function view_all_emails()
{
	require_once( 'table.php' );
}

add_action('admin_enqueue_scripts', 'wp_admin_scripts');

function wp_admin_scripts()
{
	wp_register_style('datatable', get_template_directory_uri() . '/admin/datatable.css');
	wp_enqueue_style('datatable', false, array() , false, 'all');

	wp_register_script( 'datatable', get_template_directory_uri() . '/admin/datatable.js' );
	wp_enqueue_script('datatable');

}

add_filter('xmlrpc_enabled', '__return_false');


add_action( 'wp_ajax_get_more_emails', 'get_more_emails' );
add_action( 'wp_ajax_nopriv_get_more_emails', 'get_more_emails' );

function get_more_emails()
{
	global $wpdb;
	$start = $_POST['start'];
	$length = $_POST['length'];
	$data = array();
	$where = 'where 1+1 ';

	$searchValue = $_POST['search']['value'];

	$order = $_POST['order'];
	$orderColumn = $order[0]['column'];
	$orderDir = $order[0]['dir'];

	$columns = $_POST['columns'];
	$colum = $columns[$orderColumn]['data'];

	$status_regex = $columns[6]['search']['regex'];
	$status_value = $columns[6]['search']['value'];



	if( !empty($searchValue) || $searchValue !== '' )
		$where .= "AND `nome` like '%{$searchValue}%' or `telefone` like '%{$searchValue}%' or `email` like '%{$searchValue}%' or `assunto` like '%{$searchValue}%' or `mensagem` like '%{$searchValue}%' ";

	$order = "Order by {$colum} {$orderDir}";


	$pf = $wpdb->prefix;
	$totalEmails = $wpdb->get_results("SELECT COUNT(ID) as total FROM `{$pf}formulario` {$where}", OBJECT );
	$emails = $wpdb->get_results("SELECT * FROM `{$pf}formulario` {$where} {$order} LIMIT {$start}, {$length} ", OBJECT );

	foreach ($emails as $key => $email) 
	{
		$data[$key]['nome'] = $email->nome;
		$data[$key]['email'] = $email->email;
		$data[$key]['telefone'] = $email->telefone;
		$data[$key]['assunto'] = $email->assunto;
		$data[$key]['mensagem'] = $email->mensagem;
		$data[$key]['send_date'] = $email->send_date;
	}

	$response = [
		"draw" =>  $_POST['draw'],
		"recordsFiltered" =>  $wpdb->num_rows,
		"recordsTotal" => $totalEmails->total,
		"data" => $data,
	];

	echo json_encode($response);

	die();
}

add_action('admin_menu', 'create_menu_page' );
function create_menu_page()
{
	add_menu_page( 
		$page_title = 'Emails', 
		$menu_title = 'Emails', 
		$capability = 'administrator', 
		$menu_slug  = 'view_emails.php', 
		$function   = 'view_all_emails'
	);
}


$dra_current_WP_version = get_bloginfo('version');

if ( version_compare( $dra_current_WP_version, '4.7', '>=' ) ) {
    DRA_Force_Auth_Error();
} else {
    DRA_Disable_Via_Filters();
}


/**
 * This function is called if the current version of WordPress is 4.7 or above
 * Forcibly raise an authentication error to the REST API if the user is not logged in
 */
function DRA_Force_Auth_Error() {
    add_filter( 'rest_authentication_errors', 'DRA_only_allow_logged_in_rest_access' );
}

/**
 * This function gets called if the current version of WordPress is less than 4.7
 * We are able to make use of filters to actually disable the functionality entirely
 */
function DRA_Disable_Via_Filters() {
    
	// Filters for WP-API version 1.x
    add_filter( 'json_enabled', '__return_false' );
    add_filter( 'json_jsonp_enabled', '__return_false' );

    // Filters for WP-API version 2.x
    add_filter( 'rest_enabled', '__return_false' );
    add_filter( 'rest_jsonp_enabled', '__return_false' );

    // Remove REST API info from head and headers
    remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'template_redirect', 'rest_output_link_header', 11 );
	
}

/**
 * Returning an authentication error if a user who is not logged in tries to query the REST API
 * @param $access
 * @return WP_Error
 */
function DRA_only_allow_logged_in_rest_access( $access ) {

	if( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_cannot_access', __( 'Only authenticated users can access the REST API.', 'disable-json-api' ), array( 'status' => rest_authorization_required_code() ) );
    }

    return $access;
	
}
