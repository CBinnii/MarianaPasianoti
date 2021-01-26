<?php 
	get_header();
?>
	<div class="pontos-de-venda" id="pontos-de-venda">
		<div class="content">
			<div class="bg-top"></div>
			<div class="container">
				<!-- Lojas Virtuais -->
					<div class="title">
						Lojas Virtuais
					</div>
					<div class="divisor">
						<span class="borda magenta"></span>
						<span class="borda"></span>
					</div>
					<div class="conteudo">
						<?php
							$posts = get_posts(
								array(
									'post_type' => 'lojas-virtuais',
									'post_status'      => 'publish',
									'orderby' => 'title',
									'showposts' => -1,
									'order' => 'ASC'
								)
							);
							foreach ($posts as $ind => $post): 
								$web = get_post_meta( $post->ID, 'website', true );
								echo "<div class='texto virtual'><a href='http://{$web}' target='_blank' >{$post->post_title}</a></div>";
							endforeach;
						?>
					</div>
				<div class="clearfix"></div>
			</div>
			<div class="gray-bg">
				<!-- Pontos de Vendas -->
					<div class="title loja-virtual">	
						<div class="container">
							<div class="left">Pontos de Venda</div>

							<p id="content" class="right">Filtrar por estado: 
								<select id="options" style="height:40px;line-height:40px;width:100px;border:0;text-align:center;outline:none;">
									<option value="">Todos</option>
									<?php
										$ufs = $wpdb->get_results(
												"SELECT DISTINCT(le.`uf`)
												FROM `wp_postmeta` AS wp 
												INNER JOIN `wp_list_estado` AS le ON le.`id` = wp.`meta_value`
												WHERE wp.`meta_key` = 'estates' 
												ORDER BY wp.`meta_value` + 0 ASC ");
										foreach ( $ufs as $key => $value ):
									?>
										<option value="<?php echo "{$value->uf}"; ?>"><?php echo "{$value->uf}"; ?></option>
									<?php
										endforeach;
									?>
								</select>
							</p>

							<div class="clearfix"></div>
							
							<div class="divisor">
								<span class="borda magenta"></span>
								<span class="borda"></span>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="conteudo">
							<div class="texto">
								<div class="panel-group" id="accordion" >
									<?php
										global $wpdb;

										$metas = $wpdb->get_results(
											"SELECT DISTINCT(wp.`meta_value`), le.`uf`, le.`nome`
											FROM `wp_postmeta` AS wp 
											INNER JOIN `wp_list_estado` AS le ON le.`id` = wp.`meta_value`
											WHERE wp.`meta_key` = 'estates' 
											ORDER BY wp.`meta_value` + 0 ASC ");

										$index = 1;
										foreach ( $metas as $key => $value ):
											$citys = $wpdb->get_results(
											"SELECT DISTINCT(wp.`meta_value`), le.`id`, le.`nome`, le.`estado`
											FROM `wp_postmeta` AS wp 
											INNER JOIN `wp_list_cidade` AS le ON le.`id` = wp.`meta_value`
											WHERE wp.`meta_key` = 'city'  
												AND le.`estado` = {$value->meta_value}
											ORDER BY wp.`meta_value` + 0 ASC ");

											foreach ( $citys as $kay => $cit ):
									?>
										<div class="panel" data-city="<?php echo "{$cit->id}";?>" data-uf="<?php echo "{$value->uf}";?>">
											<div class="panel-heading">
												<a class="panel-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index; ?>">
													<?php echo "{$cit->nome} - {$value->uf}"; ?>
												</a>
											</div>
											<div id="collapse<?php echo $index; ?>" class="panel-collapse collapse ">
												<div class="panel-inner">
													<?php

														$posts = get_posts(
															array(
																'post_type' => 'venda',
																'meta_key' => 'city',
																'post_status' => 'publish',
																'meta_value' => $cit->meta_value,
																'orderby' => 'title',
																'order' => 'ASC',
																'showposts' => -1
															)
														);

														foreach ($posts as $ind => $post): 

															$add = get_post_meta( $post->ID, 'address', true );
															$tel = get_post_meta( $post->ID, 'phone', true );
															$web = get_post_meta( $post->ID, 'website', true );
															?>
															
																<div class="mais">
																	<div class="titles openModalClass" id="<?php echo $post->ID ?>" onclick="getPontoDeVenda(this.id)" data-toggle="modal" data-target="#myModal"><?php echo $post->post_title; ?></div>

																	<?php if(isset($add) && $add != '' ): ?>
																		<div class="address openModalClass" id="<?php echo $post->ID ?>" onclick="getPontoDeVenda(this.id)" data-toggle="modal" data-target="#myModal"><?php echo $add; ?></div>
																	<?php endif; ?>

																	<?php if(isset($tel) && $tel != '' ): ?>
																		<div class="telefone"><a href="tel:<?php echo $tel; ?>"><?php echo $tel; ?></a></div>
																	<?php endif; ?>

																	<?php if(isset($web) && $web != '' ): ?>
																		<div class="website"><a href="http://<?php echo $web; ?>" target="_blank"><?php echo $web; ?></a></div>
																	<?php endif; ?>
																</div>
															<?php
														endforeach;
													?>
												</div>
											</div>
										</div>
									<?php
											$index++;
											endforeach;
										endforeach;
									?>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="bg-bottom"></div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					<div class="modal-body">
						<div id="map"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		//<![CDATA[
			function getPontoDeVenda(id) {
				var objeto = {
					action 	: 'getPonto',
					id 		: id,
				}

				jQuery.post('/wp-admin/admin-ajax.php', objeto, function(data){
					if (data != ""){
						jQuery("#myModalLabel").html('');
						jQuery("#myModalLabel").html(data[0]['title']);
						initMap(data);
					}

				},'json');

				return false;
			}

			function initMap(data) {
				var beaches = data;

				var contentString = '';
				var marker = [];

				// Create a map object and specify the DOM element for display.
				var map = new google.maps.Map(document.getElementById('map'), {
					scrollwheel: false,
					zoom: 14
				});
				map.setCenter(new google.maps.LatLng(data[0]['localization'][0], data[0]['localization'][1]));

				marker = setMarkers(map, beaches, marker);

				$.each(marker, function(e,l){
					l.addListener('click', function() {
						var info = '<div style="line-height:1.5em">'+
							'<h1><div style="font-weight:bold">'+l.title+'</div></h1>'+
							'<p>'+l.address+'</p>'+
							'<p>Tel: '+l.phone+'</p>'+
							'<p><a href="http://'+l.website+'" target="_blank">'+l.website+'</a></p></div>';
						infowindow.setContent(info);
						infowindow.open(map, l);
					});
				});

				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
			}

			function setMarkers(map, beaches, marker) {

				var image = {
					url: '<?php echo IMAGES; ?>/farma.png',
					// This marker is 20 pixels wide by 32 pixels high.
					size: new google.maps.Size(36, 36),
					// The origin for this image is (0, 0).
					origin: new google.maps.Point(0, 0),
					// The anchor for this image is the base of the flagpole at (0, 32).
					anchor: new google.maps.Point(36, 36)
				};

				for (var i = 0; i < beaches.length; i++) {
					var beach = beaches[i];

					var itens = {
						position: {lat: parseFloat(beach.localization[0]), lng: parseFloat(beach.localization[1]) },
						map: map,
						icon: image,
						title: beach.title,
						address: beach.address,
						phone: beach.phone,
						website: beach.website
					}

					marker[i] = new google.maps.Marker(itens);
				}

				return marker;
			}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQGD5YmU9iHR1Mu_qbaVKRs3xI-YpYWRw" async defer></script>
<?php
	get_footer();
?>