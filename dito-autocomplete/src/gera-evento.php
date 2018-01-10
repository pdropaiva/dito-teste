<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Gerar eventos pela API</title>
<script src="js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
</head>
<body>
<button type="button" id="create_event">Clique</button>  para simular um evento
<div class="result"></div>
<script type="text/javascript">
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

	function getRandomInt(min, max) {
		min = Math.ceil(min);
		max = Math.floor(max);
		return Math.floor(Math.random() * (max - min)) + min;
	}

	var arrayEvent = ['buy', 'look', 'add to cart', 'add to favorite', 'leave'];

	// $('#create_event').click(function() {
  //
	// 	data = {};
	// 	data.event = arrayEvent[getRandomInt(0, arrayEvent.length)];
	// 	data.timestamp = new Date().toISOString();
	// 	console.log('Tentando acessar a api via: '+domain);
	// 	$.post( domain+"/event",data,  function( data ) {
	// 	  $( ".result" ).html( data.message );
	// 	}).fail(function(data) {
  //
	// 			$( ".result" ).html( data );
	// 	  	alert( "error" );
	// 	});
	// });

	$('#create_event').click(function() {

		data = {
			method: 'post',
			url: '/event'
		};
		data.event = arrayEvent[getRandomInt(0, arrayEvent.length)];
		data.timestamp = new Date().toISOString();
		$.post( "/dito-autocomplete/api.php",data,  function( data ) {
			data = JSON.parse(data);
			console.log(data);
		  $( ".result" ).html( data.message );
		}).fail(function(data) {

				$( ".result" ).html( data );
		  	alert( "error" );
		});
	});
</script>
</body>
</html>
