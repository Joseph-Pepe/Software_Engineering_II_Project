<?php
// Require a secure connection:
// require_once('../utility/secure_connection.php');
?>

<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Login</title>
     <link rel = "stylesheet" type = "text/css" href = "Cstyles/login_signup_styles.css"/>
 </head>

 <body>
    <header>
       <form action="." method="post">
          <input type="hidden" name="action" value="view_signup">
          <input type="submit" value="Create Account (Signup)">
       </form>
       <form action="." method="post">
          <input type="hidden" name="action" value="view_login">
          <input type="submit" value="Login">
       </form>
    </header>
    <main class = "signupForm">
       <form method = "post" id = "login_form" class = "aligned" action = ".">
	  <input type="hidden" name="action" value="login">
	       
          <label>E-Mail:</label>
          <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" size="30">
          <?php echo $fields->getField('email')->getHTML(); ?><br>

          <label>Password:</label>
          <input type="password" name="password" size="30">
          <?php echo $fields->getField('password')->getHTML(); ?><br>
	       
	  <?php if (!empty($password_message)) : ?>         
             <span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>
          <?php endif; ?>
	   
          <input type="submit" value="Login">
	  <input type = "reset" value = "Clear"/>
          
       </form>
    </main>
    <?php include 'footer.php'; ?>
 </body>	
</html>
