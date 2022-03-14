<?php
// Require a secure connection:
require_once('utility/secure_connection.php');

// Require a valid user:
require_once('utility/valid_user_account.php');
?>

<!DOCTYPE html>
<html>

   <?php if($user_role == "instructor"){ ?>
	    
   <?php }else if($user_role == "student"){ ?>
	
   <?php }?>
</html>
