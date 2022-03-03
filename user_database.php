<?php
function add_user($email, $password){
  global $database;
  
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
  $database_query = 
}
?>
