<?php
include("../Database/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name  = $_POST['first-name'];
    $last_name   = $_POST['last-name'];
    $email       = $_POST['email'];
    $phone       = $_POST['phone'];
    $mobile      = $_POST['mobile'];
    $blood       = $_POST['blood-group'];
    $sex         = $_POST['sex'];
    $dob         = $_POST['dob'];
    $designation = $_POST['designation'];
    $department  = $_POST['department'];
    $specialist  = $_POST['specialist'];
    $address     = $_POST['address'];
    $status      = $_POST['status'];


    $prefix = "D" . date("Ymd");
    

    $result = mysqli_query($conn, "SELECT doctor_id FROM doctors WHERE doctor_id LIKE '$prefix%' ORDER BY id DESC LIMIT 1");

 ?> 
