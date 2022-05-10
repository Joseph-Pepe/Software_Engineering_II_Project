<?php
require_once('utility/main.php');
require_once('model/user_database.php');
require_once('model/course_database.php');
require_once('model/fields.php');
require_once('model/validate.php');

// Get the action to perform (e.g., login, homepage)
$action = filter_input(INPUT_POST, 'action');
if($action == NULL){
   $action = filter_input(INPUT_GET, 'action');
   if($action == NULL){
      $action = 'view_login';
      if (isset($_SESSION['user'])) {
         $action = 'view_homepage';
      }
   }
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

// For the login page
$fields->addField('password');

// Perform the specified action.
switch($action){
   case 'view_signup':
      // Clear Data:
      $email = '';
      $first_name = '';
      $last_name = '';
      include 'account/account_signup.php';
      break;
   case 'signup':
      // Store user data in local variables
      $email = filter_input(INPUT_POST, 'email');
      $password_1 = filter_input(INPUT_POST, 'password_1');
      $password_2 = filter_input(INPUT_POST, 'password_2');
      $first_name = filter_input(INPUT_POST, 'first_name');
      $last_name = filter_input(INPUT_POST, 'last_name');
      $account_type = filter_input(INPUT_POST, 'account_type');
      
      // Validate user data       
      $validate->email('email', $email);
      $validate->text('password_1', $password_1, true, 10, 30);
      $validate->text('password_2', $password_2, true, 10, 30);        
      $validate->text('first_name', $first_name);
      $validate->text('last_name', $last_name);
      
      // If validation errors, redisplay signup page and exit controller.
      if ($fields->hasErrors()) {
          include 'account/account_signup.php';
          break;
      }

      // If passwords don't match, redisplay signup page and exit controller.
      if ($password_1 !== $password_2) {
          $password_message = 'Passwords do not match.';
          include 'account/account_signup.php';
          break;
      }

      // Validate the data for the user.
      if (is_valid_user_email($email)) {
          display_error('The e-mail address ' . $email . ' is already in use.');
      }

      // Add the customer data to the database
      $user_id = add_user($email, $first_name, $last_name, $password_1, $account_type);
      
      // Store user data in session
      $_SESSION['user'] = get_user($user_id);
      
      redirect('.');
      break;
   case 'view_login':
      // Clear login data
      $email = '';
      $password = '';
      $password_message = '';
      include 'account/account_login_signup.php';
      break;
   case 'login':
      $email = filter_input(INPUT_POST, 'email');
      $password = filter_input(INPUT_POST, 'password');
      
      // Validate user data
      $validate->email('email', $email);
      $validate->text('password', $password, true, 10, 30);
      
      // If validation errors, redisplay login page and exit controller
      if ($fields->hasErrors()) {
          include 'account/account_login_signup.php';
          break;
      }
      
      // Check email and password in database.
      if (is_valid_user_login($email, $password)) {
          $_SESSION['user'] = get_user_by_email($email);
      }else {
          $password_message = 'Login failed. Invalid email or password.';
          include 'account/account_login_signup.php';
          break;
      }
      redirect('.');
      break;
   case 'view_homepage':   
      $user_name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'];
      $email = $_SESSION['user']['email_address'];   
      $account_type = $_SESSION['user']['account_type'];
      $courses = get_all_courses($user_name);

      include 'view/homepage.php';
      break;
   case 'view_course':
      $course_number = filter_input(INPUT_GET, 'course_number', FILTER_VALIDATE_INT);
      $course = get_course($course_number);
      $user_name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'];
      $roster_number = filter_input(INPUT_GET, 'roster_number', FILTER_VALIDATE_INT);
      $roster = get_course_roster($course_number);
      $_SESSION['roster_number'] = $roster_number;
      $_SESSION['course_number'] = $roster_number;
      $_SESSION['roster'] = $roster;
      include('course/course_view.php');
      break;
    case 'add_student_roster':
      $email = filter_input(INPUT_POST, 'email');
      $roster_number = $_SESSION['roster_number'];
      $roster_number = $_SESSION['course_number'];
      $roster = $_SESSION['roster']
         
      // Validate user data
      $validate->email('email', $email);
      
      // If validation errors, redisplay login page and exit controller
      if ($fields->hasErrors()) {
          include('course/course_view.php');
          break;
      }
      
      // Check email.
      if (!is_valid_user_email($email)) {
          $course_error_message = 'Email is invalid.';
          include 'course/course_view.php';
      }
      break;
    case 'delete':
        $roster_number = filter_input(INPUT_POST, 'roster_number', FILTER_VALIDATE_INT);
        $course_number = filter_input(INPUT_POST, 'course_number', FILTER_VALIDATE_INT);
        delete_student($roster_number);
        redirect($app_path);
        break;
   case 'show_add_form':
        $course_number = filter_input(INPUT_GET, 'course_number', FILTER_VALIDATE_INT);
        if ($course_number === null) {
            $course_number = filter_input(INPUT_POST, 'course_number', FILTER_VALIDATE_INT);
        }
        $course = get_course($course_number);
        include('course/create_course.php');
        break;
    case 'create_course':
        $course_number = filter_input(INPUT_GET, 'course_number', FILTER_VALIDATE_INT);
        $course_name = filter_input(INPUT_POST, 'course_name');
        $user_name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'];
        $term = filter_input(INPUT_POST, 'term');
        $days = filter_input(INPUT_POST, 'days', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        $course_days = '';
        $start_end_time = filter_input(INPUT_POST, 'start_end_time');
        $section = filter_input(INPUT_POST, 'section');
      
        // Validate inputs
        if (empty($course_name) || empty($term) || empty($section) || empty($start_end_time) || $days === NULL) {
            $course_error_message = 'Invalid course data. Check all fields and try again.';
            include('course/create_course.php');
        } else {
            foreach($days as $key => $value){
               $course_days = $course_days . ' [ ' . $value . ' ] ';
            }
            if (is_existing_course($course_name, $user_name, $term, $course_days, $start_end_time, $section)) {
               $course_error_message = 'Course already exists. Check all fields and try again.';
               include('course/create_course.php');
            }else {
               $course_number = add_course($course_name, $user_name, $term, $course_days, $start_end_time, $section);
               $course = get_course($course_number);
               $roster_number = filter_input(INPUT_GET, 'roster_number', FILTER_VALIDATE_INT);
               $roster = get_course_roster($course_number);
               include('course/course_view.php');
            }
        }
        break;
   case 'logout':
      unset($_SESSION['user']);
      redirect('.');
      break;
   default:
      display_error("Unknown account action: " . $action);
      break;
}
?>
