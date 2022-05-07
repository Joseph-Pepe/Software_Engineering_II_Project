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
        $courses = ;
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
        
        break;
}
?>
