<?php
// Require a secure connection:
require_once('utilities/secure_connection.php');
?>

<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Login</title>
     <link rel = "stylesheet" type = "text/css" href = "styles.css"/>
 </head>

 <body>
    <header>
       <h1>Login</h1>
       <hr/>
    </header>
    
    <form method = "post" align = "center" action = "process_login.php">
	 <input name = "action" type = "hidden" value = "login"/>
	 <!-- [Form]: Stores the form data in a $_POST array (can retrieve the values from the superglobal variables). -->
	 <div id = "data">
	    <label>First Name:</label>
	    <input type = "text" name = "user_first_name" required/>
		 
            <label>Last Name:</label>
	    <input type = "text" name = "user_last_name" required/>
		 
	    <label>Email:</label>
	    <input type = "text" name = "user_email" required/>

	    <label>Password:</label>
	    <input type = "text" name = "user_password" required/>
	 </div>
	
	 <select name = "user_role">
	    <option value = "student">Student</option>
	    <option value = "instructor">Instructor</option>
	 </select>
	
	
	 <div id = "buttons" align = "center">
	    <label>&nbsp;</label>
	    <input type = "submit" value = "Login"/>
	    <input type = "reset" value = "Clear"/>
	 </div>
	
	 <?php if(!empty($error_message)){ ?>
	    <b class = "error" align = "center" style = "color: red;">Error:</b><?php echo htmlspecialchars($error_message); ?>
	 <?php } ?>
    </form>
    <footer>
       <h6>&copy; 2022 by Company_Name_Here, Inc. All rights reserved.</h6>
    </footer>
 </body>	
</html>
