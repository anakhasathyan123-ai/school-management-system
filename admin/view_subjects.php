<?php
include("../config/db.php");
include("navbar.php");
include("admin_auth.php");
$result = mysqli_query($conn,
    "SELECT subjects.subject_name, teachers.name
     FROM subjects
     JOIN teachers ON subjects.teacher_id = teachers.teacher_id"
);
?>

<div class="container">
    <h2>Subjects</h2>

    <table>
        <tr>
            <th>Subject</th>
            <th>Teacher</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['subject_name']; ?></td>
                <td><?php echo $row['name']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
