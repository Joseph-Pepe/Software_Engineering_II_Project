// Information to connect to database:
$data_source_name = 'mysql:host=localhost;dbname=csit415';
$username = 'canvas';
$password = 'software';
$options = array(PDO::ATTR_MODE => PDO::ERRMODE_EXCEPTION);







/*
// Handles a PHP data object (PDO) exception.
try{
   // Create a database object:
   $database = new PDO($data_source_name, $username, $password, $options);
   echo '<p>You are connected to the database!</p>';
}// Catches PDO exception:
catch(PDOException $database_exception){
   // Executes the object's method.
   $error_message = $database_exception->getMessage();
   include('../view/database_connection_error.php');
   exit();
}
*/
