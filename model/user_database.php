<?php
function add_user($email, $first_name, $last_name, $password, $account_type) {
   
   
    global $database;
    $add_user_query = 'INSERT INTO accounts (first_name, last_name, email_address, password, account_type)
                       VALUES (:first_name, :last_name, :email, :password, :account_type)';
    $add_user = $database->prepare($add_user_query);
    $add_user->bindValue(':email', $email);
    $add_user->bindValue(':password', $password);
    $add_user->bindValue(':first_name', $first_name);
    $add_user->bindValue(':last_name', $last_name);
    $add_user->execute();
    $user_id = $db->lastInsertId();
    $add_user->closeCursor();
    return $user_id;
}

function is_valid_user_login($email, $password){
   global $database;
   
   $search_query = 'SELECT password FROM accounts 
                    WHERE email_address = :email AND password = :password';
   $locate_user = $database->prepare($search_query);
   
   // Method bindValue(parameter, value):
   $locate_user->bindValue(':email', $email);
   $locate_user->bindValue(':password', $password);
   
   // Execute SQL statement:
   $locate_user->execute();
   
   /*
   // Store the record retrieved from the database in a variable.
   $row = $locate_user->fetch();
   $locate_user->closeCursor();
   
   // Returns true if the hashed password matches the specified hash.
   if(!$row)
      return false;
   
   $retrieved_hashed_password = $row['password'];
   return password_verify($password, $retrieved_hashed_password);
   */

   $valid = ($locate_user->rowCount() == 1);
   $locate_user->closeCursor();
   return $valid;
}
?>
