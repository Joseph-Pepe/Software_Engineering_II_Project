<!DOCTYPE html>
<html>
 <head>
     <meta charset = "utf-8">
     <title>Create Class</title>
     <link rel = "stylesheet" type = "text/css" href = ""/>
 </head>

 <body>
    <main>
       <form method = "post" id = "login_form" class = "aligned" action = ".">
	        <input type="hidden" name="action" value="create_class">
	       
          <label>Class Name:</label>
          <input type="text" name="class_name" size="30">

          <label>Term:</label>
          <input type="password" name="password" size="30">
	   
          <input type="submit" value="Create Course">
	        <input type = "reset" value = "Clear"/>
       </form>
    </main>
    <?php include 'footer.php'; ?>
 </body>	
</html>
