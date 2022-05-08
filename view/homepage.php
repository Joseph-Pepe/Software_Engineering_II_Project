<?php
require_once('utility/main.php');
require_once('model/course_database.php');

// Get an array of courses from the database
$courses = array();
foreach ($course_numbers as $course_number) {
    $course = get_product($course_number);
    $courses[] = $course;
}
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
      </div>
   </body>
</html>
