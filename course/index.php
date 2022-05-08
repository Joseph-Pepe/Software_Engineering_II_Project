<?php
require_once('../../util/main.php');
require_once('../model/course_database.php');

$instructor = $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'];
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
        $courses = get_all_courses($instructor);
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
        $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
        $class_name = filter_input(INPUT_POST, 'class_name');
        $term = filter_input(INPUT_POST, 'term');
        $days = filter_input(INPUT_POST, 'days', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        $start_end_time = filter_input(INPUT_POST, 'start_end_time');
        $section = filter_input(INPUT_POST, 'section');
        
        // Validate inputs
        if (empty($class_name) || empty($term) || empty($start_end_time) || $days === NULL) {
            $error = 'Invalid product data. Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $product_id = add_product($category_id, $code, $name, $description, $price, $discount_percent);
            include('product_view.php');
        }
        break;
}
?>
