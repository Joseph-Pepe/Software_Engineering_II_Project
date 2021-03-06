<?php
require_once('utility/main.php');
require_once('model/course_database.php');
?>

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
         <h2>Welcome <?php echo $account_type . ': ' . $user_name; ?></h2>
	 <hr/>
	 <h2 class="top">My Courses</h2>
         <p>To view a course, select it (i.e., press it).</p>
         
         <?php if (count($courses) == 0) : ?>
            <p>No courses currently exist.</p>
         <?php else : ?>
            <?php foreach ($courses as $course) : ?>
               <p>
                  <a href="?action=view_course&amp;course_number=<?php echo $course['course_number']; ?>"> <?php echo htmlspecialchars($course['course_name']); ?></a>
               </p>
           <?php endforeach; ?>
        <?php endif; ?>
	<h2>Add Course (New Class)</h2>
	<p>To add a course, select the "Add Course" link.</p>
        <p><a href="index.php?action=show_add_form">Add Course (+)</a></p>
      </div>
   </body>
</html>
