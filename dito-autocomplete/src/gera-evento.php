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

	function getRandomInt(min, max) {
		min = Math.ceil(min);
		max = Math.floor(max);
		return Math.floor(Math.random() * (max - min)) + min;
	}

	var arrayEvent = ['buy', 'look', 'add to cart', 'add to favorite', 'leave'];

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
