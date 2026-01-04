<?php
include("../config/db.php");
include("navbar.php");
include("admin_auth.php");
$message = "";

if (isset($_POST['submit'])) {
    $name    = $_POST['name'];
    $subject = $_POST['subject'];
    $email   = $_POST['email'];

    $sql = "INSERT INTO teachers (name, subject, email)
            VALUES ('$name', '$subject', '$email')";

    if (mysqli_query($conn, $sql)) {
        $message = "Teacher added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Add Teacher</h2>

    <?php if ($message != "") { ?>
        <p style="color:green; text-align:center;"><?php echo $message; ?></p>
    <?php } ?>

    <form method="post">
        <label>Teacher Name:</label>
        <input type="text" name="name" required>

        <label>Subject:</label>
        <input type="text" name="subject" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <button type="submit" name="submit">Add Teacher</button>
    </form>

    <br>
    <a href="../index.php">Back to Home</a>
</div>

</body>
</html>
