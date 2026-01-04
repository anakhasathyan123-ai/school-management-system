<?php
include("../config/db.php");
include("navbar.php");
include("admin_auth.php");

if (isset($_POST['submit'])) {
    $subject_name = $_POST['subject_name'];
    $teacher_id = $_POST['teacher_id'];

    mysqli_query($conn,
        "INSERT INTO subjects (subject_name, teacher_id)
         VALUES ('$subject_name', '$teacher_id')"
    );
}
?>

<div class="container">
    <h2>Add Subject</h2>

    <form method="post">
        <label>Subject Name</label>
        <input type="text" name="subject_name" required>

        <label>Teacher ID</label>
        <input type="number" name="teacher_id" required>

        <input type="submit" name="submit" value="Add Subject">
    </form>
</div>
