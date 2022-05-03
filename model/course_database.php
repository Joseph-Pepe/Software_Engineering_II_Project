<?php
function add_course($class_name, $instructor, $term, $day, $start_time, $end_time, $start_date, $end_date, $section) {
    global $database;
    $query = 'INSERT INTO courses (instructor, term, day, class_name, start_time, end_time, start_date, end_date, section)
              VALUES (:instructor, :term, :day, :class_name, :start_time, :end_time, start_date, end_date, section)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':instructor', instructor);
        $statement->bindValue(':term', $term);
        $statement->bindValue(':day', $day);
        $statement->bindValue(':class_name', $class_name);
        $statement->bindValue(':start_time', $start_time);
        $statement->bindValue(':end_time', $end_time);
        $statement->bindValue(':start_date', $start_date);
        $statement->bindValue(':end_date', $end_date);
        $statement->bindValue(':section', $section);
        $statement->execute();
        $statement->closeCursor();

        // Get the last course ID that was automatically generated
        $course_id = $database->lastInsertId();
        return $course_id;
    } catch (PDOException $exception_object) {
        $error_message = $exception_object->getMessage();
        display_db_error($error_message);
    }
}

function get_course($course_id) {
    global $database;
    $query = 'SELECT * FROM courses WHERE course_id = :course_id';
    try {
        $statement = $database->prepare($query);
        $statement->bindValue(':course_id', $course_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>
