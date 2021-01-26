<?php

	function sendMail(){
		$copia = $_POST['email'];
		$destinatario = get_field('email_destinatario','options');
		$assunto = $_POST['assunto'];

		$headers[] = 'Cc: ' . $copia ; // note you can just use a simple email address
		$headers[] = 'Reply-To: '. $_POST['email']; // note you can just use a simple email address

		$headers2[] = 'Reply-To: '. $_POST['email']; // note you can just use a simple email address

		$message = "";
		$message = "Contato - Pasianoti \n\n";
		$message .= "Nome: " . $_POST['nome'] . "\n";
		$message .= "E-mail: " . $_POST['email'] . "\n";
		$message .= "Telefone: " . $_POST['telefone'] . "\n";
		$message .= "Assunto: " . $_POST['assunto'] . "\n";
		$message .= "Mensagem: " . $_POST['mensagem'] . "\n";

		$message_2 = "";
		$message_2 = "Obrigada pelo contato.\n\n";
		$message_2 .= "Recebemos seu e-mail. Retornaremos em breve. \n\n";
		$message_2 .= "Mariana Pasianoti\n";

		global $wpdb;

		
		$name = $_POST['nome'];
		$mail = $_POST['email'];
		$phone = $_POST['telefone'];
		$message = $_POST['mensagem'];
		$send_date = date('Y/m/d H:i:s', time());

		$wpdb->insert('contact_log',
			array(
				'name'	   => $name,
				'mail'     => $mail,
				'phone'    => $phone,
				'assunto'  => $assunto,
				'message'  => $message,
				'date'     => $send_date
			),
			array(
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
			)
		);

		wp_mail( $destinatario, "Contato - " . $assunto, $message, $headers );
		wp_mail( $mail, "Obrigada pelo seu contato - " . $assunto, $message_2, $headers2 );
	}

	add_action('wp_ajax_sendMail', 'sendMail');
	add_action('wp_ajax_nopriv_sendMail', 'sendMail');

	function get_more_info_mails() {
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
			$where .= "AND `telefone` like '%{$searchValue}%'";

		$order = "Order by {$colum} {$orderDir}";


		$pf = $wpdb->prefix;
		$totalEmails = $wpdb->get_results("SELECT COUNT(id) as total FROM `contact_log` {$where}", OBJECT );
		$emails = $wpdb->get_results("SELECT * FROM `contact_log` {$where} {$order} LIMIT {$start}, {$length} ", OBJECT );

		foreach ($emails as $key => $email) 
		{
			$data[$key]['name'] = $email->name;
			$data[$key]['mail'] = $email->mail;
			$data[$key]['phone'] = $email->phone;
			$data[$key]['assunto'] = $email->assunto;
			$data[$key]['message'] = $email->message;
			$data[$key]['date'] = $email->date;
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

	add_action( 'wp_ajax_get_more_info_mails', 'get_more_info_mails' );
	add_action( 'wp_ajax_nopriv_get_more_info_mails', 'get_more_info_mails' );

	function create_menu_page_info() {
		add_menu_page( 
			$page_title = 'Info Mails', 
			$menu_title = 'Info Mails', 
			$capability = 'administrator', 
			$menu_slug  = 'view_info_mails.php', 
			$function   = 'view_all_info_mails'
		);
	}

	add_action('admin_menu', 'create_menu_page_info' );