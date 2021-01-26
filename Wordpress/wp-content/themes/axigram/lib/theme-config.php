<?php

$odin_theme_options = new Odin_Theme_Options( 
	'configuracoes_smtp',
	__( 'Configurações SMTP', 'odin' ),
	'manage_options'
);

$odin_theme_options->set_tabs(
	array(
		array(
			'id' => 'smtp_tab',
			'title' => __( 'Configurações SMTP', 'odin' ),
		),
		array(
			'id' => 'email_tab',
			'title' => __( 'Emails', 'odin' ),
		)
	)
);

$odin_theme_options->set_fields(
	array(
		'config_stmp' => array(
			'tab'   => 'smtp_tab',
			'title' => __( 'Configurações SMTP', 'odin' ),
			'fields' => array(
				array(
					'id' => 'host',
					'label' => __( 'Host:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'porta',
					'label' => __( 'Porta:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'usuario',
					'label' => __( 'Usuário:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'senha',
					'label' => __( 'Senha', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'seguranca',
					'label' => __( 'Segurança', 'odin' ),
					'description' => __( 'Ex.: tls', 'odin' ),
					'type' => 'text'
				)
			)
		),
		'config_email' => array(
			'tab'   => 'email_tab',
			'title' => __( 'Configuração de EMAIL', 'odin' ),
			'fields' => array(
				array(
					'id' => 'email_principal',
					'label' => __( 'Email:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'email_copia_1',
					'label' => __( 'Email copia 1:', 'odin' ),
					'type' => 'text'
				),
				array(
					'id' => 'email_copia_2',
					'label' => __( 'Email copia 2:', 'odin' ),
					'type' => 'text'
				)
			)
		)
	)
);