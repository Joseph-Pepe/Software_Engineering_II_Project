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
     <link rel = "stylesheet" type = "text/css" href = "styles.css"/>
 </head>

 <body>
    <header>
       <h1>Account Signup</h1>
       <hr/>
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
	
	  <label>&nbsp;</label>
	  <input type = "submit" value = "Signup"/>
	  <input type = "reset" value = "Clear"/>
       </form>
    </main>
    <?php include 'footer.php'; ?>
 </body>	
</html>
