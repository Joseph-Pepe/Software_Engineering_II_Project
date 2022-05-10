<!-- -->
<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Homepage</title>
      <link rel = "stylesheet" type = "text/css" href = "Cstyles/home_page_styles.css"/>
      <link rel = "stylesheet" type = "text/css" href = "Cstyles/side_bar_styles.css"/>
   </head>
	
   <body id="flexParent"> 
      <div id="flexLeft">
         <?php include 'view/side_bar.php'; ?>
      </div>
      <div id="flexRight">
         <h2>View Course</h2>
	 
	 <hr/>
    
         <!-- display course -->
         <?php include 'view/course.php'; ?>
	      
	 <h2>Roster (Students)</h2>
         
         <?php if (count($roster) == 0) : ?>
            <p>No students currently enrolled.</p>
         <?php else : ?>
            <?php foreach ($roster as $student) : ?>
               <p><?php echo htmlspecialchars($student['student_full_name'] . ' (' . htmlspecialchars($student['student_email'] .')')) ?></p>
	       <form action="." method="post" class="inline">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="roster_number" value="<?php echo $student['roster_number']; ?>">
                  <input type="submit" value="Delete">
               </form>
           <?php endforeach; ?>
        <?php endif; ?>
      </div>
   </body>
</html>
