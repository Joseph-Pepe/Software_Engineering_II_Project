<?php
// Require a secure connection:
require_once('utility/secure_connection.php');
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
    
    <form method = "post" id = "login_form" class = "aligned" action = ".">
	 <input name = "action" type = "hidden" value = "login"/>
	 <!-- [Form]: Stores the form data in a $_POST array (can retrieve the values from the superglobal variables). -->
	 <div id = "data">
	    <!--
		    <label>First Name:</label>
		    <input type = "text" name = "first_name" required/>

		    <label>Last Name:</label>
		    <input type = "text" name = "last_name" required/>
            -->
	    <label>Email:</label>
	    <input type = "text" name = "email" required/>

	    <label>Password:</label>
	    <input type = "text" name = "password" required/>
	 </div>
	
	 <select name = "account_type">
	    <option value = "student">Student</option>
	    <option value = "instructor">Instructor</option>
	 </select>
	
	
	 <div id = "buttons" align = "center">
	    <label>&nbsp;</label>
	    <input type = "submit" value = "Login"/>
	    <input type = "reset" value = "Clear"/>
	 </div>
	
	 <?php if(!empty($login_message)){ ?>
	    <b class = "error" align = "center" style = "color: red;">Error:</b><?php echo htmlspecialchars($login_message); ?>
	 <?php } ?>
    </form>
    <?php include 'view/footer'; ?>
 </body>	
</html>
