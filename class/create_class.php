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
          <input type="text" name="term" size="30">
	       
	  <select name = "term">
	     <option value = "fall">Fall</option>
	     <option value = "spring">Spring</option>
             <option value = "winterim">Winterim</option>
             <option value = "summer">Summer</option>
	  </select>
	       
	  <label>Start Time:</label>
          <input type="text" name="start_time" size="30">
	       
	  <label>End Time:</label>
          <input type="text" name="end_time" size="30">
	       
	  <label>Day:</label>
          <input type="text" name="day" size="30">
	   
          <input type="submit" value="Create Course">
	  <input type = "reset" value = "Clear"/>
       </form>
    </main>
 </body>	
</html>
