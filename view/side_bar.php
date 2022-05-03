<aside>
     <h2>Actions (Links)</h2>
     <ul>
         <li>
             <a href="<?php echo $app_path; ?>">Home</a>
         </li>

         <?php
             /* Provides the path to the application, and then the path to the (index.php) file will the appropriate action.*/
          
             // Logout Account:
             $logout_url = $app_path . '?action=logout';
          
             // Create Course:
             $create_course_url = $app_path . 'course';
         ?>
         <li>
             <a href="<?php echo $create_course_url; ?>">Create Course</a>
         </li>
          
         <li>
             <a href="<?php echo $app_path . 'course'; ?>">View Courses</a>
         </li>
          
         <li>
             <a href="<?php echo $logout_url; ?>">Logout</a>
         </li>
    </ul>
</aside>
