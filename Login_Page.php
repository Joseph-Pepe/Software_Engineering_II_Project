<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Login</title>
 </head>

 <body>
 
    <header>
       <h1>Login</h1>
       <hr/>
    </header>
    
    <form method = "post" align = "center" action = "process_login.php">
	 <div id = "data">
	    <label>First Name:</label>
	    <input type = "text" name = "user_name" required>
		 
            <label>First Name:</label>
	    <input type = "text" name = "user_name" required>

	    <label>Password:</label>
	    <input type = "text" name = "user_password" required>
	 </div>
	
	 <select name = "user_role">
	    <option value = "student">Student</option>
	    <option value = "instructor">Instructor</option>
	 </select>
	
	
	 <div id = "buttons">
	    <label>&nbsp;</label>
	    <input type = "submit" value = "Login">
	    <input type = "reset" value = "Clear">
	 </div>
	
	 <?php if(!empty($error_message)){ ?>
	    <b class = "error" align = "center" style = "color: red;">Error: <?php echo htmlspecialchars($error_message); ?></b>
	 <?php } ?>
    </form>
    <footer>
       <h6>&copy; 2022 by Company_Name_Here, Inc. All rights reserved.</h6>
    </footer>
 </body>	
</html>
