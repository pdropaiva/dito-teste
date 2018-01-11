<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dito Autocomplete</title>
  	<link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.css">
  	<script src="js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
  	<script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
  	<script>

		  $( function() {

		    $( "#events" ).autocomplete({
		    	source: function(request, response) {

				    	if(request.term.length > 1) {

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
