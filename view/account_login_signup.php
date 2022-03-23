<?php
// Require a secure connection:
// require_once('../utility/secure_connection.php');
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
    <main>
       <form method = "post" id = "login_form" class = "aligned" action = ".">
          <label>E-Mail:</label>
          <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" size="30">
          <?php echo $fields->getField('email')->getHTML(); ?><br>

          <label>Password:</label>
          <input type="password" name="password" size="30">
          <?php echo $fields->getField('password')->getHTML(); ?><br>
	   
          <input type="submit" value="Login">
	  <input type = "reset" value = "Clear"/>
          <?php if (!empty($password_message)) : ?>         
          <span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>
          <?php endif; ?>
       </form>
	    
       <h1>Create Account (Signup)</h1>
       <form action="." method="post">
          <input type="hidden" name="action" value="view_signup">
          <input type="submit" value="Register">
       </form>
    </main>
    <?php include 'footer.php'; ?>
 </body>	
</html>
