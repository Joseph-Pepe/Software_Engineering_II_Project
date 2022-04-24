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
            $logout_url = $account_url . '?action=logout';
        ?>
        <li>
            <a href="<?php echo $logout_url; ?>">Logout</a>
        </li>
    </ul>
</aside>
