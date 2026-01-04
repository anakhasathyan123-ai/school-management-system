<?php
include("../config/db.php");
include("navbar.php");
include("admin_auth.php");

$message = "";

if (isset($_POST['submit'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $class  = $_POST['class'];
    $gender = $_POST['gender'];
    $dob    = $_POST['dob'];

    $sql = "INSERT INTO students (name, email, class, gender, dob)
            VALUES ('$name', '$email', '$class', '$gender', '$dob')";

    if (mysqli_query($conn, $sql)) {
        $message = "Student added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Student</h2>

    <?php if ($message != "") { ?>
        <p style="color:green;"><?php echo $message; ?></p>
    <?php } ?>

    <form method="post">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Class</label>
        <input type="text" name="class" required>

        <label>Gender</label>
        <select name="gender" required>
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
        </select>

        <label>Date of Birth</label>
        <input type="date" name="dob" required>

        <input type="submit" name="submit" value="Add Student">
    </form>

    <br>
    <a href="../index.php">Back to Home</a>
</div>

</body>
</html>
