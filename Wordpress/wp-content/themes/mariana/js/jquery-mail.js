$('#send').on("click", function( event ){
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var mensagem = '';
	if($('#nome').val() == ""){
		mensagem = 'Nome é obrigatório.';
		$('#alert').html('');
		$('#alert').append(createHTML('warning', mensagem));
		$('#nome').focus();
		return false;
	}
	else if ($('#email').val() == ""){
		mensagem = 'E-mail é obrigatório.';
		$('#alert').html('');
		$('#alert').append(createHTML('warning', mensagem));
		$('#email').focus();
		return false;
	}
	else if(!re.test($('#email').val())) {
		mensagem = 'E-mail é inválido.';
		$('#alert').append(createHTML('warning', mensagem));
		$('#email').focus();
		return false;
	}
	else if ($('#telefone').val() == ""){
		mensagem = 'Telefone é obrigatório.';
		$('#alert').html('');
		$('#alert').append(createHTML('warning', mensagem));
		$('#telefone').focus();
		return false;
	}
	else if ($('#mensagem').val() == ""){
		mensagem = 'Mensagem é obrigatório.';
		$('#alert').html('');
		$('#alert').append(createHTML('warning', mensagem));
		$('#mensagem').focus();
		return false;
	}
	else{
		$('#send').addClass('hide');
		$('.loading').removeClass('hide');

		var objeto = { 
			action     	: 'sendMail',
			'nome'	   	: $('#nome').val(),
			'email'	   	: $('#email').val(),
			'telefone' 	: $('#telefone').val(),
			'assunto'  	: $('#assunto').val(),
			'mensagem'	: $('#mensagem').val()
		};

		console.log(objeto);

		$.post('../../wp-admin/admin-ajax.php', objeto, function(response){
			console.log(response);

			if (response == 0){
				$('#nome').val("");
				$('#email').val("");
				$('#telefone').val(""),
				$('#assunto').val(""),
				$('#mensagem').val("");
				mensagem = 'Muito obrigado pelo seu contato! Entraremos em contato em breve.';
				$('#alert').append(createHTML('success', mensagem));
				$('#send').removeClass('hide');
				$('.loading').addClass('hide');
			}
			else {
				mensagem = 'Desculpe, ocorreu um erro ao processar o envio. Por favor tente novamente mais tarde.';
				$('#alert').append(createHTML('danger', mensagem));
			}
		});
	}
});
function createHTML(type, message){
	var html = '';
		html += '<div class="alert alert-'+ type + ' alert-dismissible" role="alert">';
			html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
			html += message;
		html += '</div>';
	return html;
}