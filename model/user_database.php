<?php
/*
function add_user($first_name, $last_name, $email, $password, $account_type){
   global $database;
   
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
   $add_user_database_query = 'INSERT INTO accounts (first_name, last_name, email, password, account_type) VALUES (:first_name, :last_name, :email, :password, :account_type)';
   $add_user = $database->prepare($add_user_database_query);
 
   // Method bindValue(parameter, value):
   $add_user->bindValue(':first_name', $first_name);
   $add_user->bindValue(':last_name', $last_name);
   $add_user->bindValue(':email', $email);
   $add_user->bindValue(':password', $hashed_password);
   $add_user->bindValue(':account_type', $account_type);
  
   // Execute SQL statement:
   $add_user->execute();
  
   $add_user->closeCursor();
}
*/

function is_valid_user_login($email, $password){
   global $database;
   
   $search_query = 'SELECT password FROM accounts 
                    WHERE email_address = :email';
   $locate_user = $database->prepare($search_query);
   
   // Method bindValue(parameter, value):
   $locate_user->bindValue(':email', $email);
   
   // Execute SQL statement:
   $locate_user->execute();
   
   // Store the record retrieved from the database in a variable.
   $row = $locate_user->fetch();
   $locate_user->closeCursor();
   
   // Returns true if the hashed password matches the specified hash.
   if($row == NULL)
      return false;
   
   $retrieved_hashed_password = $row['password'];
   return password_verify($password, $retrieved_hashed_password);
}
?>
