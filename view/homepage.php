<?php
// Require a secure connection:
require_once('utility/secure_connection.php');

// Require a valid user:
require_once('utility/valid_user_account.php');
?>

<!DOCTYPE html>
<html>
   <head>
     <meta charset = "utf-8">
     <title>Homepage</title>
     <link rel = "stylesheet" type = "text/css" href = "styles.css"/>
   </head>


   <?php if($user_role == "instructor"){ ?>
	    
   <?php }else if($user_role == "student"){ ?>
	
   <?php }?>
</html>
