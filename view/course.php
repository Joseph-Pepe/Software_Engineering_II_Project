<?php
    // Parse data
    $course_number = $course['course_number'];
    $instructor = $course['instructor'];
    $term = $course['term'];
    $days = $course['days'];
    $class_name = $course['class_name'];
    $start_end_time = $course['start_end_time'];
    $section = $course['section'];

    // Get image URL and alternate text
    $image_filename = $product_code . '_m.png';
    $image_path = $app_path . 'images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>
<h1><?php echo htmlspecialchars($class_name); ?></h1>
<div id="left_column">
    <p><img src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" /></p>
</div>
