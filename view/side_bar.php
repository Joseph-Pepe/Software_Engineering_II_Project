<aside>
     <h2>Actions (Links)</h2>
     <ul>
         <?php
             /* Provides the path to the application, and then the path to the (index.php) file with the appropriate action.*/
          
             // Logout Account:
             $logout_url = $app_path . '?action=logout';
          
             // View Courses:
             $view_course_url = $app_path . 'course';
         ?>
          
         <li>
             <a href="<?php echo $app_path; ?>">Home</a>
         </li>
         
         <li>
             <a href="<?php echo $view_course_url; ?>">View Courses</a>
         </li>
          
         <li>
             <a href="<?php echo $view_course_url . '?action=list_courses'; ?>">Create Courses</a>
         </li>
          
         <li>
             <a href="<?php echo $logout_url; ?>">Logout</a>
         </li>
    </ul>
</aside>
