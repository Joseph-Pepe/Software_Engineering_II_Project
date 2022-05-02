<aside>
     <h2>Actions (Links)</h2>
     <ul>
         <li>
             <a href="<?php echo $app_path; ?>">Home</a>
         </li>

         <li>
             <a href="<?php echo $app_path . 'classes'; ?>">View Classes</a>
         </li>
         <?php
             // Logout Account:
             $logout_url = $app_path . '?action=logout';
          
             // Create Class:
             $create_class_url = $app_path . '?action=create_class';
         ?>
         <li>
             <a href="<?php echo $create_class_url; ?>">Create Class</a>
         </li>
          
         <li>
             <a href="<?php echo $logout_url; ?>">Logout</a>
         </li>
    </ul>
</aside>
