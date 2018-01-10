<?php
ini_set('display_errors', '1');

$url = getenv('DITO_API_SERVICE_HOST');
if(isset($url) && $url != '') {
  $url = "http://{$url}/dito-api/public";
} else {
  $url = 'http://dito-api/dito-api/public';
}

$url .= $_REQUEST['url'];

$ch = curl_init();

if(isset($_REQUEST['method']) && $_REQUEST['method'] == 'post') {

  curl_setopt($ch, CURLOPT_URL, $url);

  curl_setopt($ch, CURLOPT_POST, 1);

  unset($_REQUEST['url']);
  unset($_REQUEST['method']);

  curl_setopt($ch, CURLOPT_POSTFIELDS, $_REQUEST);

} else {

  $query = http_build_query($_REQUEST);

  curl_setopt($ch, CURLOPT_URL, $url.'?'.$query);
}

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);

curl_close($ch);

echo $output;
