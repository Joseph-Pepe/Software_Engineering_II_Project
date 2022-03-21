<?php
// Start session management and include necessary functions.
$lifetime = 60 * 15; // 15 minutes
session_set_cookie_params($lifetime, '/');
session_start();
require_once('model/database_connection.php');
require_once('model/user_database.php');
require_once('model/fields.php');
require_once('model/validate.php');

// Get the action to perform (e.g., login, homepage)
$action = filter_input(INPUT_POST, 'action');
if($action == NULL){
   $action = filter_input(INPUT_GET, 'action');
   if($action == NULL){
      $action = 'show_homepage';
   }
}

// If the user is not logged in, force the user to login.
if(!isset($_SESSION['is_valid_user_account'])){
   $action = 'login';
}

// Set up all possible fields to validate
$validate = new Validate();
$fields = $validate->getFields();

// For the signup page
$fields->addField('email', 'Must be valid email.');
$fields->addField('password_1');
$fields->addField('password_2');
$fields->addField('first_name');
$fields->addField('last_name');

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
   case 'show_homepage':
      include('view/homepage.php');
      break;
   case 'view_signup':
        // Clear user data
        $email = '';
        $first_name = '';
        $last_name = '';
        include 'signup.php';
        break;
    case 'signup':
        // Store user data in local variables
        $email = filter_input(INPUT_POST, 'email');
        $password_1 = filter_input(INPUT_POST, 'password_1');
        $password_2 = filter_input(INPUT_POST, 'password_2');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        
        // Validate user data       
        $validate->email('email', $email);
        $validate->text('password_1', $password_1, true, 5, 30);
        $validate->text('password_2', $password_2, true, 5, 30);        
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);

        // If validation errors, redisplay signup page and exit controller
        if ($fields->hasErrors()) {
            include 'signup.php';
            break;
        }

        // If passwords don't match, redisplay signup page and exit controller
        if ($password_1 !== $password_2) {
            $password_message = 'Passwords do not match.';
            include 'signup.php';
            break;
        }

        // Validate the data for the user
        if (is_valid_user_email($email)) {
            display_error('The e-mail address ' . $email . ' is already in use.');
        }
        
        // Add the customer data to the database
        $user_id = add_user($email, $first_name, $last_name, $password_1);

        // Store user data in session
        $_SESSION['user'] = get_user($user_id);
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
