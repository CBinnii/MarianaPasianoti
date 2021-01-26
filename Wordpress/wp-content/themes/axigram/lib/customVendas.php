<?php
	$venda = new Odin_Post_Type('Pontos de Venda','venda');

	$venda->set_labels(
		array(
			'menu_name' => __('Pontos de Venda', 'odin')
		)
	);

	$venda->set_arguments(
		array(
			'supports' => array('title')
		)
	);

	$venda_opcao = new Odin_Metabox(
		'pontos-de-venda', 
		'Pontos de Venda',
		'venda', 
		'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
		'high' // Prioridade (opções: high, core, default ou low) (opcional)
	);



	

	global $wpdb;
	$estados = $wpdb->get_results('SELECT * FROM `wp_list_estado`');
	$newEstado = array();
	foreach ($estados as $key => $est):
		$newEstado[$est->id] = $est->nome;
	endforeach;

	$postsu = 1;
	$getCity = array( '' => 'Escolha o Estado! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;' );
	if(isset($_GET['post']) && $_GET['post'] != 0){
		
		$postsu = $_GET['post'];

		$cidadesu = get_post_meta($postsu, 'city', true );
		$estadesu = get_post_meta($postsu, 'estates', true);

		$getCity = getCityhtm($estadesu);
	}

	$venda_opcao->set_fields(
		array(
			array(
				'id' 			=> 'address',
				'label' 		=> __( 'Endereço', 'odin' ),
				'type'			=> 'text'
			),
			array(
				'id'			=> 'localization',
				'label'			=> __('Geolocalization', 'odin'),
				'type'			=> 'text',
				'attributes'	=> array('readonly' => 'readonly'),
				'description'	=> 'Clique no botao para gerar a localization'
			),
			array(
			    'id'          	=> 'getGeoLocalization', // Obrigatório
			    'label'       	=> __( '', 'odin' ), // Obrigatório
			    'type'        	=> 'input', // Obrigatório
			    'description' 	=> __( 'Descrition Example', 'odin' ), // Opcional
			    'default'		=> 'Gerar localização',
			    'attributes'	=> array('type' => 'button')
			),
			array(
				'id'            => 'estates', // Obrigatório
				'label'         => __( 'Estado', 'odin' ), // Obrigatório
				'type'          => 'select', // Obrigatório
				'default'		=> $estadesu,
				'options'       => $newEstado
			),
			array(
				'id'            => 'city', // Obrigatório
				'label'         => __( 'Cidade', 'odin' ), // Obrigatório
				'type'          => 'select', // Obrigatório
				'default'		=> $cidadesu,
				'options'       => $getCity 
			),
			array(
				'id' 			=> 'phone',
				'label' 		=> __( 'Telefone', 'odin' ),
				'type'			=> 'text'
			),
			array(
				'id' 			=> 'website',
				'label' 		=> __( 'WebSite', 'odin' ),
				'type'			=> 'text',
				'attributes' 	=> array( 'placeholder' => 'drogaria.com.br'),// Opcional
				'description' 	=> __( 'Não use: http:// ou www. Ex.: drogaria.com.br', 'odin' ),
			)
		)
	);


	add_action('init', 'my_script');
	function my_script(){
		if(is_admin()){
			wp_enqueue_script(
				'custom_admin_script',  
				get_bloginfo('template_url').'/js/admin_script.js', 
				array('jquery')
			);
		}
	}




	add_action( 'wp_ajax_getCity', 'getCity' );
	function getCity(){

		$id = $_POST['estate'];
		
		global $wpdb;
		$cidades = $wpdb->get_results("SELECT * FROM `wp_list_cidade` WHERE `estado` = {$id}");
		$newCidade = '';
		foreach ($cidades as $key => $city):
			$newCidade .= "<option value='{$city->id}'>{$city->nome}</option>";
		endforeach;

		echo $newCidade;

		die();


	}

	function getCityhtm($id){

		echo $id;
		global $wpdb;
		$cidades = $wpdb->get_results("SELECT * FROM `wp_list_cidade` WHERE `estado` = {$id}");

		$newCidade = array();
		foreach ($cidades as $key => $city):
			$newCidade[$city->id] = $city->nome;
		endforeach;

		return $newCidade;

		

	}

	add_action('wp_ajax_getCoordinates', 'getCoordinates');
	add_action('wp_ajax_nopriv_getCoordinates', 'getCoordinates');
	function getCoordinates(){
		$address = $_POST['address'];
		$address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
		$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
		$response = file_get_contents($url);
		$json = json_decode($response,TRUE); //generate array object from the response from the web
		if( $json['status'] == 'OK' )
			echo ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
		else
			echo 0;
		die();
	}
















