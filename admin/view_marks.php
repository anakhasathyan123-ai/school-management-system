<?php
include("../config/db.php");
include("navbar.php");
include("admin_auth.php");
$sql = "
SELECT 
    students.name AS student_name,
    subjects.subject_name,
    marks.marks
FROM marks
JOIN students ON marks.student_id = students.student_id
JOIN subjects ON marks.subject_id = subjects.subject_id
";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Marks</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h2>Student Marks</h2>

    <table>
        <tr>
            <th>Student Name</th>
            <th>Subject</th>
            <th>Marks</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['student_name']}</td>";
                echo "<td>{$row['subject_name']}</td>";
                echo "<td>{$row['marks']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No marks found</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="../index.php" class="page-link">Back to Home</a>
</div>

</body>
</html>
