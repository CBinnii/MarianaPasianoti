<?php
	wp_register_script('contato_js', JS . 'jquery.contato.js', null, THEMEVERSION, false);
	wp_enqueue_script('contato_js');

	get_header();
	wp_head();
?>
	<div class="content">
		<div class="contato">
			<div class="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.897962239385!2d-46.54309339999999!3d-22.9539847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cec98fb763c9c5%3A0xad582e479d55e208!2sR.+Cel.+Assis+Gon%C3%A7alves%2C+419+-+Centro%2C+Bragan%C3%A7a+Paulista+-+SP%2C+12900-480!5e0!3m2!1spt-BR!2sbr!4v1410528933406" frameborder="0" style="overflow:hidden;height:100%;width:100%"></iframe>
			</div>
			<div class="box-formulario">
				<div class="wrapper">
					<div class="formulario">
						<p class="title">Contato</p>
						<div class="divisor">
							<span class="borda magenta"></span>
							<span class="borda"></span>
						</div>
						<input class="input" type="text" id="nome" name="nome" placeholder="Nome"></input>
						<input class="input" type="text" id="email" name="email" placeholder="E-mail"></input>
						<input class="input" type="text" id="telefone" name="telefone" placeholder="Telefone"></input>
						<input class="input" type="text" id="assunto" name="assunto" placeholder="Assunto"></input>
						<textarea class="input" id="mensagem" name="mensagem" placeholder="Mensagem"></textarea>
						<button id="enviar" class="btn">Enviar</button>
					</div>
					
					<div class="dados">
						<span class="logo"></span>
						<div class="divisor">
							<span class="borda magenta"></span>
							<span class="borda"></span>
						</div>
						<div class="detalhes">
							<p>Axigram Laboratórios Ltda.</p>
							<p>Rua Coronel Assis Gonçalves, 419</p>
							<p>Bragança Paulista</p>
							<p>CEP: 12900-480</p>
						</div>
						<div class="detalhes-contato">
							<p class="telefone"><span class="icon"></span>(11) 2473 4287 - (11) 2473 4290</p>
							<p class="email"><span class="icon"></span>sac@axigram.com</p>
						</div>
						<button id="mostrar-mapa" class="btn desk">Mostrar mapa</button>
						<a href="https://www.google.com/maps?ll=-22.957429,-46.530802&z=16&t=m&hl=pt-BR&gl=BR&mapclient=embed&q=R.+Cel.+Assis+Gon%C3%A7alves,+419+-+Centro+Bragan%C3%A7a+Paulista+-+SP+12900-480" target="_blank" class="btn mobi">Ver mapa</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	get_footer();
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.mapa, .box-formulario').css('height', ( $(window).height() - 130 ) );
		
		$(window).on('resize', function(){
			$('.mapa, .box-formulario').css('height', ( $(window).height() - 130 ) );
		});

		$('#mostrar-mapa').on('click', function(){
			offset = $(this).parent().offset();
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
				$('.box-formulario').css('height', ( $(window).height() - 130 ) );
				$('.formulario').show();
				$(this).parent().css({
					'position': 'relative',
					'left': 'auto',
					'top': '40px'
				});
			} else {
				$(this).addClass('active');
				$('.box-formulario').css('height', '0' );
				$('.formulario').hide();
				$(this).parent().css({
					'position': 'fixed',
					'left': offset.left - 35,
					'top': offset.top - 25
				});
			}
		});

		$('.formulario #enviar').on('click', function(){
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if(!re.test($('.formulario #email').val())) {
				alert('Insira um email válido!');
				return false;
			}

			if($('.formulario #nome').val() != "" && $('.formulario #email').val() != "" && $('.formulario #telefone').val() != ""
				&& $('.formulario #assunto').val() != "" && $('.formulario #mensagem').val() != "") {
				$('.formulario #enviar').addClass("disabled");
				$.post('/wp-admin/admin-ajax.php', {
					action: 'sendMail',
					nome: $('.formulario #nome').val(),
					email: $('.formulario #email').val(),
					telefone: $('.formulario #telefone').val(),
					assunto: $('.formulario #assunto').val(),
					mensagem: $('.formulario #mensagem').val()
				}, function(data){
					console.log(data);
					if(data == 0) {
						$('.formulario #nome').val("");
						$('.formulario #email').val("");
						$('.formulario #telefone').val("");
						$('.formulario #assunto').val("");
						$('.formulario #mensagem').val("");
						alert("Seu email foi enviado com sucesso");
					} else {
						console.log("");
						console.log(data);
					}
					$('.formulario #enviar').removeClass("disabled");
				});
			} else {
				alert('Preencha todos os campos');
			}
		});

		$('ul.nav li').on('click', function(){
			$('ul.nav li').removeClass('active');

			if ( $(this).hasClass('active') )
				$(this).removeClass('active');
			else
				$(this).addClass('active');
		});
	});
</script>