<?php

add_action( 'wp_ajax_sendMail', 'sendMail' );
add_action( 'wp_ajax_nopriv_sendMail', 'sendMail' );

function sendMail(){
	$email_options = get_option('email_tab');

	$headers[] = 'Reply-To: '. $_POST['email']; // note you can just use a simple email address

	if(!empty($email_options['email_copia_1'])) {
		$headers[] = 'Cc: ' . $email_options['email_copia_1'] ; // Envia Cópia
	}

	$message = '';
	$message .= 'Nome: ' . $_POST['nome'] . ". \n";
	$message .= 'Email: ' . $_POST['email'] . ". \n";
	$message .= 'Telefone: ' . $_POST['telefone'] . ". \n";
	$message .= 'Assunto: ' . $_POST['assunto'] . ". \n";
	$message .= 'Mensagem: ' . $_POST['mensagem'] . ". \n";

	global $wpdb;

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$assunto = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];
	$send_date = date('Y/m/d H:i:s', time());

	$wpdb->insert('wp_formulario',
		array(
			'nome'	   => $nome,
			'email'	   => $email,
			'telefone' => $telefone,
			'assunto' => $assunto,
			'mensagem' => $mensagem,
			'send_date' => $send_date
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

	return wp_mail( $optionsInfo['email_principal'], ucwords(strtolower($_POST['assunto'])) . " - E-mail via Axigram site", $message, $headers );
}