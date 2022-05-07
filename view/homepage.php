<!DOCTYPE html>
<html>
   <head>
      <meta charset = "utf-8">
      <title>Homepage</title>
      <link rel = "stylesheet" type = "text/css" href = "Cstyles/home_page_styles.css"/>
      <link rel = "stylesheet" type = "text/css" href = "Cstyles/side_bar_styles.css"/>

   </head>
	
   <body id="flexParent"> 
      <div id="flexLeft">
         <?php include 'view/side_bar.php'; ?>
      </div>
      <div id="flexRight">
         <h2>Welcome <?php echo $user_name; ?></h2>
	 <hr/>
      </div>
   </body>
</html>
