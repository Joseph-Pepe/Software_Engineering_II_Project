<?php
    // Parse data
    $course_number = $product['course_number'];
    $instructor = $product['instructor'];
    $term = $product['term'];
    $day = $product['day'];
    $class_name = $product['class_name'];
    $start_time = $product['start_time'];
    $end_time = $product['end_time'];
    $start_date = $product['start_date'];
    $end_date = $product['end_date'];
    $section = $product['end_date'];

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

<div id="right_column">
    <p><b>List Price:</b>
        <?php echo '$' . $list_price; ?></p>
    <p><b>Your Price:</b>
        <?php echo '$' . $unit_price_f; ?></p>
</div>
