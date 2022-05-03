<?php
require_once('../../util/main.php');

$action = strtolower(filter_input(INPUT_POST, 'action'));
if ($action == NULL) {
    $action = strtolower(filter_input(INPUT_GET, 'action'));
    if ($action == NULL) {        
        $action = 'list_courses';
    }
}

switch ($action) {
    case 'list_courses':
        // get categories and products
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        if (empty($category_id)) {
            $category_id = 1;
        }
        $current_category = get_category($category_id);
        $categories = get_categories();
        $products = get_products_by_category($category_id);

        // display product list
        include('course_list.php');
        break;
    case 'view_course':
        $categories = get_categories();
        $product_id = filter_input(INPUT_GET, 'product_id', 
                FILTER_VALIDATE_INT);
        $product = get_product($product_id);
        $product_order_count = get_product_order_count($product_id);
        include('course_view.php');
        break;
    case 'show_add_form':
        $product_id = filter_input(INPUT_GET, 'product_id', 
                FILTER_VALIDATE_INT);
        if ($product_id === null) {
            $product_id = filter_input(INPUT_POST, 'product_id', 
                    FILTER_VALIDATE_INT);
        }
        $product = get_product($product_id);
        $categories = get_categories();
        include('course_add.php');
        break;
    case 'add_course':
        $category_id = filter_input(INPUT_POST, 'category_id', 
                FILTER_VALIDATE_INT);
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price', 
                FILTER_VALIDATE_FLOAT);
        $discount_percent = filter_input(INPUT_POST, 'discount_percent', 
                FILTER_VALIDATE_FLOAT);

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
            include('course_view.php');
        }
        break;
}
?>
