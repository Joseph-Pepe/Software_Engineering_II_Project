<?php
    // Parse data
    $course_number = $course['course_number'];
    $instructor = $course['instructor'];
    $term = $course['term'];
    $days = $course['days'];
    $class_name = $course['class_name'];
    $start_end_time = $course['start_end_time'];
    $section = $course['section'];
    /*
    // Get image URL and alternate text
    $image_filename = $product_code . '_m.png';
    $image_path = $app_path . 'images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
    */
?>
<!--
<h1><?php echo htmlspecialchars($class_name); ?></h1>
<div id="left_column">
    <p><img src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" /></p>
</div>
-->
<div id="right_column">
    <p><b>List Price:</b>
        <?php echo '$' . $list_price; ?></p>
    <p><b>Discount:</b>
        <?php echo $discount_percent_f . '%'; ?></p>
    <p><b>Your Price:</b>
        <?php echo '$' . $unit_price_f; ?>
        (You save
        <?php echo '$' . $discount_amount_f; ?>)</p>
    <form action="<?php echo $app_path . 'cart' ?>" method="get" 
          id="add_to_cart_form">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="product_id"
               value="<?php echo $product_id; ?>" />
        <b>Quantity:</b>&nbsp;
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to Cart" />
    </form>
    <h2>Description</h2>
    <?php echo $description_with_tags; ?>
</div>
