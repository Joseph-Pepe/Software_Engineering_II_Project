<?php
   // Set default value of variables for initial page load.
   if(!isset($course_error_message)) {$course_error_message = '';}
?>

<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Create Class</title>
     <link rel = "stylesheet" type = "text/css" href = "Cstyles/home_page_styles.css"/>
     <link rel = "stylesheet" type = "text/css" href = "Cstyles/side_bar_styles.css"/>
 </head>
	
 <!-- -->
 <body id="flexParent">
    <div id="flexLeft">
       <?php include 'view/side_bar.php'; ?>
    </div>
    <div id="flexRight">
       <h2>Create Course (New Class)</h2>
	    
       <hr/>
	    
       <form action = "index.php" method = "post" id = "add_course_form" class = "aligned">
	  <input type="hidden" name="action" value="create_course">
	       
          <label>Class Name:</label>
          <select name = "course_name">
             <option value = "Software Engineering I">Software Engineering I</option>
	     <option value = "Software Engineering II">Software Engineering II</option>
	     <option value = "Datastructures & Algorithms">Datastructures & Algorithms</option>
	     <option value = "Web Services">Web Services</option>
	     <option value = "Differential Equations">Differential Equations</option>
	     <option value = "Calculus III">Calculus III</option>
	  </select>
	       
	  <br>
	       
	  <label>Section:</label>
          <select name = "section">
             <option value = "00">00</option>
	     <option value = "01">01</option>
	     <option value = "02">02</option>
	     <option value = "03">03</option>
             <option value = "04">04</option>
             <option value = "05">05</option>
	  </select>
	       
	  <br>

          <label>Term:</label>
          <select name = "term">
	     <option value = "fall (08/01/22 - 12/10/22)">Fall (08/01/22 - 12/10/22)</option>
	     <option value = "spring (02/10/22 - 05/10/22)">Spring (02/01/22 - 05/10/22)</option>
             <option value = "winterim (01/01/22 - 02/01/22)">Winterim (01/01/22 - 02/01/22)</option>
             <option value = "summer (06/10/22 - 08/23/22)">Summer (06/10/22 - 08/23/22)</option>
	  </select>
	       
	  <br>
	       
	  <label>Start Time & End Time:</label>
          <select name = "start_end_time">
             <option value = "8:40am - 10:25am">8:40am - 10:25am</option>
	     <option value = "10:25am - 12:00pm">10:25am - 12:00pm</option>
	     <option value = "12:00pm - 1:45pm">12:00pm - 1:45pm</option>
	     <option value = "1:45pm - 3:30pm">1:45pm - 3:30pm</option>
             <option value = "3:30pm - 5:15pm">3:30pm - 5:15pm</option>
             <option value = "5:15pm - 7:00pm">5:15pm - 7:00pm</option>
	  </select>
	       
	  <br>
	       
	  <label>Days:</label> 

	  <br> 
	       
	  <input type = "checkbox" name = "days[]" value = "mon">Monday<br>
          <input type = "checkbox" name = "days[]" value = "tue">Tuesday<br>
	  <input type = "checkbox" name = "days[]" value = "wed">Wednesday<br>
	  <input type = "checkbox" name = "days[]" value = "thur">Thursday<br>
	  <input type = "checkbox" name = "days[]" value = "fri">Friday
	       
	  <br>
	       
	  <?php if(!empty($course_error_message)){ ?>
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
