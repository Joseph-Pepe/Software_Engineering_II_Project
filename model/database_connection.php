// Information to connect to a database:
$data_source_name = 'mysql:host=localhost;dbname=database_name';
$username = 'account_username';
$password = 'account_user_password';

// Handles a PHP data object (PDO) exception.
try{
   // Create a database object:
   $database = new PDO($data_source_name, $username, $password); 
   echo '<p>You are connected to the database!</p>';
}// Catches PDO exception:
catch(PDOException $database_exception){
   // Executes the object's method.
   $error_message = $database_exception->getMessage();
   include('../errors/database_connection_error.php');
   exit();
   //echo "<p>An error occurred while connecting to the database: $error_message</p>";
}// Catches any type of exception:
catch(Exception $exception){
   // Executes the object's method.
   //$error_message = $exception->getMessage();
   //echo "<p>Any Error Message: $error_message</p>";
}
