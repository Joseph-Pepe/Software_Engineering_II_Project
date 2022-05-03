<?php
// Require a secure connection:
// require_once('utility/secure_connection.php');

// Require a valid user:
// require_once('utility/valid_user_account.php');

include 'view/side_bar.php';
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Homepage</title>
      <link rel = "stylesheet" type = "text/css" href = "Cstyles/home_page_styles.css"/>
   </head>
	
   <body> 
      <header>
         <h2>Welcome <?php echo $user_name; ?></h2>
	 <hr/>
      </header>
      <main>
	 <!--
         <?php // if($user_role == "instructor"){ ?>
	    <a href = "index.php?action=student_file_1">instructor_file_1</a>
	    <a href = "index.php?action=student_file_2">instructor_file_2</a>
	 <?php // }else if($user_role == "student"){?>
	    <a href = "index.php?action=student_file_1">student_file_1</a>
	    <a href = "index.php?action=student_file_2">student_file_2</a>
         <?php // }?>
         -->
      </main>
   </body>
</html>
