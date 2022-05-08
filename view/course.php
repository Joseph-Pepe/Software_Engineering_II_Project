<?php
    // Parse data
    $course_number = $course['course_number'];
    $instructor = $course['instructor'];
    $term = $course['term'];
    $days = $course['days'];
    $course_name = $course['course_name'];
    $start_end_time = $course['start_end_time'];
    $section = $course['section'];
?>
<div id="right_column">
    <p><b>Course Name:</b>
        <?php echo $course_name; ?></p>
    <p><b>Course Number:</b>
        <?php echo $course_number; ?></p>
    <p><b>Instructor:</b>
        <?php echo $instructor; ?></p>
    <p><b>Term:</b>
        <?php echo $term; ?></p>
    <p><b>Days:</b>
        <?php echo $days; ?></p>
    <p><b>Start & End Time:</b>
        <?php echo $start_end_time; ?></p>
    <p><b>Section:</b>
        <?php echo $section; ?></p>
</div>
