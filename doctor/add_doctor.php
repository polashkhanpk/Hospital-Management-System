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

    $prefix = "D" . date("Ymd")
    $result = mysqli_query($conn, "SELECT doctor_id FROM doctors WHERE doctor_id LIKE '$prefix%' ORDER BY id DESC LIMIT 1");

    if (mysqli_num_rows($result) > 0) {
        $row         = mysqli_fetch_assoc($result);
        $last_number = intval(substr($row['doctor_id'], -3)); 
        $new_number  = $last_number + 1;
    }
    else {
        $new_number = 1;
    }

    $doctor_id = $prefix . str_pad($new_number, 3, '0', STR_PAD_LEFT);

    $sql = "INSERT INTO doctors 
        (doctor_id, first_name, last_name, email, phone, mobile, blood_group, sex, dob, designation, department, specialist, address, status)
        VALUES 
        ('$doctor_id', '$first_name', '$last_name', '$email', '$phone', '$mobile', '$blood', '$sex', '$dob', '$designation', '$department', '$specialist', '$address', '$status')";

    $run = mysqli_query($conn, $sql);

    if ($run) {
        echo "<script>
                alert('Doctor added successfully. ID: $doctor_id');
                window.location='doctor.php';
              </script>";
    } else {
        echo "Submission failed!";
    }

 ?> 
