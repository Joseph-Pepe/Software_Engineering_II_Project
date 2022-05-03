<?php include '../../view/side_bar.php'; ?>
<DOCTYPE html>
<html>
  <main>
    <h1 class="top">List Courses</h1>
    <p>To view a course, select it (press it).</p>
    <p>To add a product, select the "Add Product" link.</p>
    <?php if (count($courses) == 0) : ?>
        <p>No courses currently exist.</p>
    <?php else : ?>
        <?php foreach ($courses as $course) : ?>
        <p>
            <a href="?action=view_course&amp;course_id=<?php echo $course['course_id']; ?>"> <?php echo htmlspecialchars($course['course_name']); ?></a>
        </p>
        <?php endforeach; ?>
    <?php endif; ?>

    <h1>Links</h1>
    <p><a href="index.php?action=show_add_form">Add Course</a></p>
  </main>
</html>
