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
	
   <body> 
      <header>
         <h2>Welcome User</h2>
	 <hr/>
      </header>
      <div id = "links">
         <?php if($user_role == "instructor"){ ?>
	    <a class = "selection" href = "file_1.html">file_1</a>
	    <a class = "selection" href = "file_2.html">file_2</a>
	 <?php }else if($user_role == "student"){?>
	    <a class = "selection" href = "file_1.html">file_1</a>
         <?php }?>
      </div>
   </body>
</html>
