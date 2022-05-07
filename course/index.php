<?php
require_once('../../util/main.php');
require_once('../model/course_database.php');

$action = strtolower(filter_input(INPUT_POST, 'action'));
if ($action == NULL) {
    $action = strtolower(filter_input(INPUT_GET, 'action'));
    if ($action == NULL) {        
        $action = 'list_courses';
    }
}

switch ($action) {
    case 'list_courses':
        $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
        if (empty($course_id)) {
            $course_id = 1;
        }
        $current_course = get_course($course_id);
        $instructor_name = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'];
        $courses = get_all_courses($instructor_name);
        // display product list
        include('course_list.php');
        break;
    case 'view_course':
        $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
        $course = get_course($course_id);
        include('course_view.php');
        break;
    case 'show_add_form':
        $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
        if ($course_id === null) {
            $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT);
        }
        $course = get_course($course_id);
        include('course_add.php');
        break;
    case 'add_course':
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_FLOAT);

        // Validate inputs
        if (empty($code) || empty($name) || empty($description) ||
            $price === false || $discount_percent === false) {
            $error = 'Invalid product data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            $product_id = add_product($category_id, $code, $name,
                    $description, $price, $discount_percent);
            $product = get_product($product_id);
            include('product_view.php');
        }
        break;
}
?>
