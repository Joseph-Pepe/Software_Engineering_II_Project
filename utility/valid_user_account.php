<?php
require_once('model/database_connection.php');
require_once('model/user_database.php');

// Make sure the user is logged in as a valid user account:
if(!isset($_SESSION['is_valid_user_account'])){
   header("Location: ."); 
}

/*
$email = '';
$password = '';

// 'PHP_AUTH_USER:' Is the username from the authentication dialog box or NULL if the box was not displayed.
// 'PHP_AUTH_PW:'  Is the password from the authentication dialog box or NULL if the box was not displayed.
if(!isset($_SERVER['PHP_AUTH_USER'])) && isset($_SERVER['PHP_AUTH_PW'])){
   $email = $_SERVER['PHP_AUTH_USER'];
   $password = $_SERVER['PHP_AUTH_PW'];
}

if(!is_valid_user_login($email, $password)){
   header('WWW-Authenticate: Basic realm = "Admin"');
   header('HTTP/1.0 401 Unauthorized');
   include('unauthorized.php');
   exit();
}
*/
?>
