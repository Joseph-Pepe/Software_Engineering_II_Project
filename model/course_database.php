<?php
function add_course($course_name, $instructor, $term, $days, $start_end_time, $section) {
    global $database;
    $query = 'INSERT INTO courses (instructor, term, days, course_name, start_end_time, section)
              VALUES (:instructor, :term, :days, :course_name, :start_end_time, :section)';
    try {
        $statement = $database->prepare($query);
        $statement->bindValue(':instructor', $instructor);
        $statement->bindValue(':term', $term);
        $statement->bindValue(':days', $days);
        $statement->bindValue(':course_name', $course_name);
        $statement->bindValue(':start_end_time', $start_end_time);
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

function is_existing_course($course_name, $instructor, $term, $days, $start_end_time, $section) {
    // Course Data
    global $database;
    $course_query = 'SELECT * FROM courses WHERE instructor = :instructor AND term = :term AND days = :days AND course_name = :course_name AND start_end_time = :start_end_time AND section = :section';
    $statement = $database->prepare($course_query);
    $statement->bindValue(':instructor', $instructor);
    $statement->bindValue(':term', $term);
    $statement->bindValue(':days', $days);
    $statement->bindValue(':course_name', $course_name);
    $statement->bindValue(':start_end_time', $start_end_time);
    $statement->bindValue(':section', $section);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}


function get_all_courses($instructor) {
    global $database;
    $query = 'SELECT * FROM courses WHERE instructor = :instructor';
    $statement = $database->prepare($query);
    $statement->bindValue(':instructor', $instructor);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
}

function get_course($course_number) {
    global $database;
    $query = 'SELECT * FROM courses WHERE course_number = :course_number';
    try {
        $statement = $database->prepare($query);
        $statement->bindValue(':course_number', $course_number);
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
