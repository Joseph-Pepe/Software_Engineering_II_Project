<?php include '../../view/side_bar.php'; ?>
<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Create Class</title>
     <link rel = "stylesheet" type = "text/css" href = ""/>
 </head>

 <body>
    <main>
       <form action="index.php" method="post" id="add_product_form">
            <input type="hidden" name="category_id"
                   value="<?php echo $product['categoryID']; ?>">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : 
            if ($category['categoryID'] == $product['categoryID']) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
        ?>
            <option value="<?php echo $category['categoryID']; ?>"<?php
                      echo $selected ?>>
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="text" name="name" 
               value="<?php echo htmlspecialchars($product['productName']); ?>" 
               size="50">
        <br>

        <label>List Price:</label>
        <input type="text" name="price" 
               value="<?php echo $product['listPrice']; ?>">
        <br>
        
    </form>
       <form action = "index.php" method = "post" id = "add_course_form" class = "aligned">
	  <input type="hidden" name="action" value="create_class">
	       
          <label>Class Name:</label>
          <select name = "start_time">
             <option value = "Software Engineering I">Software Engineering I</option>
	     <option value = "Software Engineering II">Software Engineering II</option>
	     <option value = "Datastructures & Algorithms">Datastructures & Algorithms</option>
	     <option value = "Web Services">Web Services</option>
	     <option value = "Differential Equations">Differential Equations</option>
	     <option value = "Calculus III">Calculus III</option>
	  </select>

          <label>Term:</label>
          <select name = "term">
	     <option value = "fall">Fall</option>
	     <option value = "spring">Spring</option>
             <option value = "winterim">Winterim</option>
             <option value = "summer">Summer</option>
	  </select>
	       
	  <label>Start Time & End Time:</label>
          <select name = "start_time">
             <option value = "8:40am - 10:25am">8:40am - 10:25am</option>
	     <option value = "10:25am - 12:00pm">10:25am - 12:00pm</option>
	     <option value = "12:00pm - 1:45pm">12:00pm - 1:45pm</option>
	     <option value = "1:45pm - 3:30pm">1:45pm - 3:30pm</option>
             <option value = "3:30pm - 5:15pm">3:30pm - 5:15pm</option>
             <option value = "5:15pm - 7:00pm">5:15pm - 7:00pm</option>
	  </select>
	       
	  <label>Days:</label>
          <select name = "Days">
             <option value = "Monday">Monday</option>
	     <option value = "Tuesday">Tuesday</option>
	     <option value = "Wednesday">Wednesday</option>
	     <option value = "Thursday">Thursday</option>
             <option value = "Friday">Friday</option>
	  </select>
	   
	  <label>&nbsp;</label>
          <input type="submit" value="Create Course">
	  <input type = "reset" value = "Clear"/>
       </form>
    </main>
 </body>	
</html>
