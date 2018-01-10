<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dito Autocomplete</title>
  	<link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.css">
  	<script src="js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
  	<script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
  	<script>
		// 	var domain = 'http://localhost:5000/dito-api/public';
    //
		// <?php
		// 	$host = getenv('DITO_API_SERVICE_HOST');
		// 	if(isset($host) && $host != '') {
		// 		?>
		// 		domain = 'http://dito-api.com/dito-api/public';
		// 		<?php
		// 	}
		// ?>

		  $( function() {

		    $( "#events" ).autocomplete({
		    	source: function(request, response) {

				    		if(request.term.length > 1) {
									// console.log('Tentando acessar a api via: '+domain);
				    		// 	$.ajax({
					      //           url: domain+"/event/search",
					      //           dataType: "json",
					      //           data: {
					      //               'search': request.term
					      //           }
					      //       }).done(function( data ) {
				        //             response(data);
				        //         });
				    		// }

								$.ajax({
												url: "/dito-autocomplete/api.php",
												dataType: "json",
												data: {
														'url': "/event/search",
														'search': request.term
												}
										}).done(function( data ) {
													response(data);
											});
							}
		        },

		        select: function( event, ui ) {
								// console.log('Tentando acessar a api via: '+domain);
		        		// $.ajax({
		            //     url: domain+"/event",
		            //     dataType: "json",
		            //     data: {
		            //         'search': ui.item.value
		            //     }
		            // }).done(function( data ) {
	            	// 		$('#show').html(JSON.stringify(data, null, 4));
	              // });

								$.ajax({
		                url: "/dito-autocomplete/api.php",
		                dataType: "json",
		                data: {
												'url': "/event",
		                    'search': ui.item.value
		                }
		            }).done(function( data ) {
	            			$('#show').html(JSON.stringify(data, null, 4));
	              });
		        }
		    });
		  } );
  	</script>
</head>
<body>
<div class="ui-widget">
  <label for="events">Events: </label>
  <input id="events">
</div>
<pre>
	<code id="show">
	</code>
</pre>
</body>
</html>
