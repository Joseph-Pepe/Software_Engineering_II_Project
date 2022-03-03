<?php
function add_user($email, $password){
   global $database;
  
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
   $add_user_database_query = 'INSERT INTO ACCOUNTS (email, password) VALUES (:email, :password)';
   $add_user = $db->prepare($add_user_database_query);
 
   // Method bindValue(parameter, value):
   $add_user->bindValue(':email', $email);
   $add_user->bindValue(':password', $hashed_password);

   // Execute SQL statement:
   $add_user->execute();
  
   $add_user->closeCursor();
}

function is_valid_user_login($email, $password){
  global $database;
  
  $locate_user_database_query = 'SELECT password FROM ACCOUNTS WHERE email = :email';
  $locate_user = $db->prepare($locate_user_database_query);
 
  // Method bindValue(parameter, value):
  $locate_user->bindValue(':email', $email);
  
  // Execute SQL statement:
  $locate_user->execute();
  
  // Store the record retrieved from the database in a variable.
  $row = $locate_user->fetch();
  
  $locate_user->closeCursor();
  
  $retrieved_hashed_password = $row['password'];

  // Returns true if the hashed password matches the specified hash.
  return password_verify($password, $retrieved_hashed_password);
}
?>
