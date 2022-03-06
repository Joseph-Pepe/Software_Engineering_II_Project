<?php
   // Make sure the user is logged in as a valid user account:
   if(!isset($_SESSION['is_valid_user_account'])){
      header("Location: .") 
   }
?>
