<?php
include '../Database/connection.php';

$query = "SELECT * FROM doctors ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
