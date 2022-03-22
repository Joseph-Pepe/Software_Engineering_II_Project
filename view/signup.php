<?php
// Require a secure connection:
// require_once('../utility/secure_connection.php');
?>

<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Signup</title>
     <link rel = "stylesheet" type = "text/css" href = "styles.css"/>
 </head>

 <body>
    <header>
       <h1>Create Account (Signup)</h1>
       <hr/>
    </header> 
    <head>
       <form method = "post" id = "signup_form" class = "aligned" action = ".">
          <input name = "action" type = "hidden" value = "signup"/>
	       
	  <label>First Name:</label>
          <input type = "text" name = "first_name" required/>

	  <label>Last Name:</label>
	  <input type = "text" name = "last_name" required/>
          
	  <label>Email:</label>
	  <input type = "text" name = "email" required/>

	  <label>Password:</label>
	  <input type = "password" name = "password" required/>
	       
	  <select name = "account_type">
	     <option value = "student">Student</option>
	     <option value = "instructor">Instructor</option>
	  </select>
	
	  <label>&nbsp;</label>
	  <input type = "submit" value = "Signup"/>
	  <input type = "reset" value = "Clear"/>
       </form>
       <?php include 'footer.php'; ?>
    </main>
 </body>	
</html>
