<?php
   // Set default value of variables for initial page load.
   if(!isset($student_roster_error_message)) {$student_roster_error_message = '';}
?>

<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Add Student Roster</title>
     <link rel = "stylesheet" type = "text/css" href = "Cstyles/home_page_styles.css"/>
     <link rel = "stylesheet" type = "text/css" href = "Cstyles/side_bar_styles.css"/>
 </head>
	
 <!-- -->
 <body id="flexParent">
    <div id="flexLeft">
       <?php include 'view/side_bar.php'; ?>
    </div>
    <div id="flexRight">
       <h2>Add Student To Roster</h2>
	    
       <hr/>
	
       <form action = "index.php" method = "post" id = "add_student_form" class = "aligned">
	  <input type="hidden" name="action" value="add_student_roster">
		
          <label>E-Mail:</label>
          <input type="text" name="email" size="30">
		
          <?php if(!empty($student_roster_error_message)){ ?>
	     <p class = "error"> <?php echo htmlspecialchars($roster_error_message); ?></p>
	  <?php } ?>
	  
	  <br>
	   
	  <label>&nbsp;</label>
          <input type="submit" value="Add Student">
	  <input type = "reset" value = "Clear"/>
       </form>
    </div>
 </body>	
</html>
