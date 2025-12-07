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
