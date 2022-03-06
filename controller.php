<?php
// Start session management and include necessary functions.
session_start();
require_once('model/database_connection.php');
require_once('model/user_database.php');

// Get the action to perform (e.g., login, view class roster)
$action = filter_input(INPUT_POST, 'action');


// If the user is not logged in, force the user to login.
if(!isset($_SESSION['is_valid_user_account'])){
   $action = 'login';
}

// Perform the specified action.
switch($action){
   case 'login':
      $email = filter_input(INPUT_POST, 'email');
      $password = filter_input(INPUT_POST, 'password');
      if(is_valid_user_login($email, $password)){
         $_SESSION['is_valid_user_account'] = true;
         include('view/homepage.php');
      }else{
         $login_message = 'You must login to view this page.';
         include('view/login_page.php');
      }
      break;
   case 'logout':
      // Clear all session data:
      $_SESSION = array();
      
      // Clear up the session ID:
      session_destroy();
    
      $login_message = 'You have been logged out.';
      include('view/login_page.php');
      break;
}
?>