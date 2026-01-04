<?php
include("../config/db.php");
include("navbar.php");
include("admin_auth.php");

$message = "";

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $marks      = $_POST['marks'];

    $sql = "INSERT INTO marks (student_id, subject_id, marks)
            VALUES ('$student_id', '$subject_id', '$marks')";

    if (mysqli_query($conn, $sql)) {
        $message = "Marks added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Marks</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Marks</h2>

    <?php if ($message != "") { ?>
        <p style="color:green; text-align:center;"><?php echo $message; ?></p>
    <?php } ?>

    <form method="post">
        <label>Student ID</label>
        <input type="number" name="student_id" required>

        <label>Subject ID</label>
        <input type="number" name="subject_id" required>

        <label>Marks</label>
        <input type="number" name="marks" required>

        <input type="submit" name="submit" value="Add Marks">
    </form>

    <br>
    <a href="../index.php" class="page-link">Back to Home</a>
</div>

</body>
</html>
