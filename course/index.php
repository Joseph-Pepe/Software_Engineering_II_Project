<?php
require_once('../utility/main.php');
require_once('../utility/images.php');
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
        $course_number = filter_input(INPUT_GET, 'course_number', FILTER_VALIDATE_INT);
        if (empty($course_number)) {
            $course_number = 1;
        }
        $current_course = get_course($course_number);
        $courses = get_all_courses($instructor);
        include('course_list.php');
        break;
    case 'view_course':
        $course_number = filter_input(INPUT_GET, 'course_number', FILTER_VALIDATE_INT);
        $course = get_course($course_number);
        include('course_view.php');
        break;
    case 'list_course_roster':
        $roster_number = filter_input(INPUT_GET, 'roster_number', FILTER_VALIDATE_INT);
        $course_number = filter_input(INPUT_GET, 'course_number', FILTER_VALIDATE_INT);
    case 'show_add_form':
        $course_number = filter_input(INPUT_GET, 'course_number', FILTER_VALIDATE_INT);
        if ($course_number === null) {
            $course_number = filter_input(INPUT_POST, 'course_number', FILTER_VALIDATE_INT);
        }
        $course = get_course($course_number);
        include('create_course.php');
        break;
    case 'create_course':
        $course_number = filter_input(INPUT_GET, 'course_number', FILTER_VALIDATE_INT);
        $course_name = filter_input(INPUT_POST, 'course_name');
        $term = filter_input(INPUT_POST, 'term');
        $days = filter_input(INPUT_POST, 'days', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        $start_end_time = filter_input(INPUT_POST, 'start_end_time');
        $section = filter_input(INPUT_POST, 'section');
        
        // Validate inputs
        if (empty($course_name) || empty($term) || empty($section) || empty($start_end_time) || $days === NULL) {
            $course_error_message = 'Invalid course data. Check all fields and try again.';
            include('create_course.php');
        } else {
            $course_id = add_course($course_name, $term, $days, $start_end_time, $section);
            $course = get_course($course_number);
            include('course_view.php');
        }
        break;
}
?>
