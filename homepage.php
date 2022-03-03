<?php
// Require a secure connection:
require_once('utility/secure_connection.php');

// Require a valid user:
require_once('utility/valid_user.php');

$user_email = filter_input(INPUT_POST, 'user_email');
$user_password = filter_input(INPUT_POST, 'user_password');
$user_role = filter_input(INPUT_POST, 'user_role');


?>
