<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "Anakha@2005",
    "school_db"
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
