<aside>
     <h2>Actions (Links)</h2>
     <ul>
         <?php
             /* Provides the path to the application, and then the path to the (index.php) file with the appropriate action.*/
          
             // Logout Account:
             $logout_url = $app_path . '?action=logout';
         ?>
          
         <li>
             <a href="<?php echo $app_path; ?>">Home</a>
         </li>
          
         <li>
             <a href="<?php echo $logout_url; ?>">Logout</a>
         </li>
    </ul>
</aside>
