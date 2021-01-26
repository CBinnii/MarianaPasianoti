<div class="wrap">
	<h1>E-mails.</h1>

	<table id="datatable"></table>

	<script>
		jQuery("#datatable").DataTable({
			"info": false,
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": ajaxurl,
				"type": "POST",
				"data": function(d) {
					d.action = 'get_more_emails'
				}
			},
			"sDom": '<"top"<"pull-left"f>p<"filterSelect col-md-3">>t<"bottom"lp><"clear">',
			"aLengthMenu": [[10, 20, 50, 75, 100], [10, 20, 50, 75, 100]],
			"language": {
				"lengthMenu": "_MENU_",
				"zeroRecords": "No results",
				"search": ""
			},
			"order": [[ 4, "desc" ]],
			"columns": [
				{ 'data': 'nome', 'sTitle': 'Nome' },
				{ 'data': 'email', 'sTitle': 'E-mail' },
				{ 'data': 'telefone', 'sTitle': 'Telefone' },
				{ 'data': 'assunto', 'sTitle': 'Assunto' },
				{ 'data': 'mensagem', 'sTitle': 'Mensagem' },
				{ 'data': 'send_date', 'sTitle': 'Data' }
			]
		});

	</script>
</div>