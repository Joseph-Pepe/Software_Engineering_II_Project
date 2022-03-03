<?php
// Make sure it is a valid user account:
if(!isset($_SESSION['is_valid_user_account'])){
   header("Location: .") 
}
?>
