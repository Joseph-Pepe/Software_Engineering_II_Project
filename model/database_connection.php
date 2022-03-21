<?php
// Information to connect to database:
$data_source_name = 'mysql:host=localhost;dbname=csit415';
$username = 'canvas';
$password = 'software';
$options = array(PDO::ATTR_MODE => PDO::ERRMODE_EXCEPTION);

// [Try/Catch]: Handles a PHP data object (PDO) exception:
try{
   $database = new PDO($data_source_name, $username, $password, $options);
   echo '<p>You are connected to the database (success)!</p>';
}catch(PDOException $exception_object){
   $error_message = $exception_object->getMessage();
   include('../view/database_connection_error.php');
   exit();
}
?>
