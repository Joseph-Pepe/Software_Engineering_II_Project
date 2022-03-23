<?php
// Make sure the page uses a secure connection (redirects to a secure connection):

// HTTPS: Returns a non-empty value if the current request is using HTTPS.
$https = filter_input(INPUT_SERVER, 'HTTPS');

if(!$https){
   // HTTP_HOST: Returns the host for another request.
   $host = filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING);
	
   // REQUEST_URI: Returns the uniform resource identifier for the current request. 
   $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', , FILTER_SANITIZE_STRING);
   $url = 'https://' . $host . $uri; 
   header("Location: " . $url);
   exit();
}
?>
