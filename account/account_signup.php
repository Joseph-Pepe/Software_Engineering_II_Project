<?php
// Require a secure connection:
// require_once('../utility/secure_connection.php');
if (!isset($password_message)) { $password_message = ''; } 
?>

<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Signup</title>
     <link rel = "stylesheet" type = "text/css" href = "Cstyles/login_signup_styles.css"/>
 </head>

 <body>
    <header class = "login_signup_selection">
       <form action="." method="post">
          <input type="hidden" name="action" value="view_signup">
          <input type="submit" value="Create Account (Signup)">
       </form>
       <form action="." method="post">
	  <input type="hidden" name="action" value="view_login">
          <input type="submit" value="Login">
       </form>
    </header>
    <main>
       <form method = "post" id = "signup_form" class = "aligned" action = ".">
          <input name = "action" type = "hidden" value = "signup"/>
	       
	  <label>E-Mail:</label>
          <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" size="30">
          <?php echo $fields->getField('email')->getHTML(); ?><br>

          <label>Password:</label>
          <input type="password" name="password_1" size="30">
          <?php echo $fields->getField('password_1')->getHTML(); ?>
          <span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>

          <label>Retype Password:</label>
          <input type="password" name="password_2" size="30">
          <?php echo $fields->getField('password_2')->getHTML(); ?><br>

          <label>First Name:</label>
          <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" size="30">
          <?php echo $fields->getField('first_name')->getHTML(); ?><br>

          <label>Last Name:</label>
          <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" size="30">
          <?php echo $fields->getField('last_name')->getHTML(); ?><br>
	       
	  <select name = "account_type">
	     <option value = "student">Student</option>
	     <option value = "instructor">Instructor</option>
	  </select>

	  <label>&nbsp;</label>
	  <input type = "submit" value = "Signup"/>
	  <input type = "reset" value = "Clear"/>
       </form>
    </main>
    <?php include 'view/footer.php'; ?>
 </body>	
</html>
