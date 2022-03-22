<?php
require_once('../model/database_connection.php');
require_once('../model/user_database.php');


// Store user data in local variables
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$account_type = filter_input(INPUT_POST, 'account_type');
        
// Add the customer data to the database
$user_id = add_user($email, $first_name, $last_name, $password, $account_type);
?>

<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Account Add</title>
     <link rel = "stylesheet" type = "text/css" href = "styles.css"/>
 </head>
     <b>Account Added to database.</b>
 <body>
    
 </body>	
</html>
