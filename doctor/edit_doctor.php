<?php
session_start();
include '../Database/connection.php';

$id = $_GET['id'];


$query  = "SELECT * FROM doctors WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) != 1) {
    die("Doctor not found!");

$doctor = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="edit_style.css">
</head>
<body>

<div class="edit-container">
    <h2>Edit Doctor</h2>
    <form action="update_doctor.php" method="post">
        <input type="hidden" name="id" value="<?= $doctor['id'] ?>">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="<?= $doctor['first_name'] ?>">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?= $doctor['last_name'] ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $doctor['email'] ?>">
        </div>

        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?= $doctor['mobile'] ?>">
        </div>
    </form>
   </div>
</body>
</html>
