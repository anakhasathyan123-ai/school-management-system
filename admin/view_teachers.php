<?php
include("../config/db.php");
include("navbar.php");
include("admin_auth.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Teachers</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Teachers List</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Email</th>
        </tr>

        <?php
        $sql = "SELECT * FROM teachers";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['teacher_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['subject']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No teachers found</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="../index.php">Back to Home</a>
</div>

</body>
</html>
