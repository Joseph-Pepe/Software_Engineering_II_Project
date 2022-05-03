<?php
function add_course($class_name, $instructor, $term, $day, $start_time, $end_time, $start_date, $end_date, $section) {
    global $database;
    $query = 'INSERT INTO courses (instructor, term, day, class_name, start_time, end_time, start_date, end_date, section)
              VALUES (:category_id, :code, :name, :description, :price, :discount_percent, NOW())';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':discount_percent', $discount_percent);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $product_id = $db->lastInsertId();
        return $product_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>
