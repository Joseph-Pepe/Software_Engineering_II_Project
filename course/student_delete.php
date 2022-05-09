<main class="nofloat">
    <h1>Delete Account</h1>
    <p>Are you sure you want to delete this student?</p>
    <form action="." method="post">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="roster_number"
               value="<?php echo $roster_number; ?>">
        <input type="submit" value="Delete Student">
    </form>
    <form action="." method="post">
        <input type="submit" value="Cancel">
    </form>
</main>
