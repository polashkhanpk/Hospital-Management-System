<?php
include '../Database/connection.php';

$query = "SELECT * FROM doctors ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctors List</title>
    <link rel="stylesheet" href="list_style.css">
    <style>
        .exit{
           padding-left: 1600px;
           padding-bottom: 22px;
        }

        .buttone{
            text-decoration: none;
            background: #ff0000ff;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
</html>
