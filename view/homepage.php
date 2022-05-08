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
         <h2>Welcome <?php echo $user_name; ?></h2>
	 <hr/>
	 <h1 class="top">List Courses</h1>
         <p>To view a course, select it (press it).</p>
         <p>To add a product, select the "Add Product" link.</p>
         <?php if (count($courses) == 0) : ?>
            <p>No courses currently exist.</p>
         <?php else : ?>
            <?php foreach ($courses as $course) : ?>
               <p>
                  <a href="?action=view_course&amp;course_number=<?php echo $course['course_number']; ?>"> <?php echo htmlspecialchars($course['course_name']); ?></a>
               </p>
           <?php endforeach; ?>
        <?php endif; ?>
      </div>
   </body>
</html>
