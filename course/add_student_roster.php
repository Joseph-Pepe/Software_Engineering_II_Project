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
	    
       <form action = "index.php" method = "post" id = "add_student_roster_form" class = "aligned">
	  <input type="hidden" name="action" value="add_student_roster">
	     
	       
	  <br>
	       
	  <?php if(!empty($student_roster_error_message)){ ?>
	     <p class = "error"> <?php echo htmlspecialchars($course_error_message); ?></p>
	  <?php } ?>
	       
	  <br>
	   
	  <label>&nbsp;</label>
          <input type="submit" value="Create Course">
	  <input type = "reset" value = "Clear"/>
       </form>
    </div>
 </body>	
</html>
