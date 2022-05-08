<?php
require_once('utility/main.php');
require_once('model/course_database.php');

// Get an array of courses from the database
$courses = array();
foreach ($course_numbers as $course_number) {
    $course = get_course($course_number);
    $courses[] = $course;
}

foreach ($courses as $course) {
    $course_name = $course['course_name'];
    $course_number = $course['course_number'];
    $instructor = $course['instructor']; 
    $term = $course['term'];
    $days = $course['days'];
    $start_end_time = $course['start_end_time'];
    $section = $course['section'];
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
