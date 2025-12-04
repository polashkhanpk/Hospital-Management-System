<?php
include("../Database/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST['first-name'];
    $last_name  = $_POST['last-name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $mobile     = $_POST['mobile'];
    $blood      = $_POST['blood-group'];
    $sex        = $_POST['sex'];
    $dob        = $_POST['dob'];
    $address    = $_POST['address'];
    $status     = $_POST['status'];


    $prefix = "P" . date("Ymd");
    

    $result = mysqli_query($conn, "SELECT patient_id FROM patients WHERE patient_id LIKE '$prefix%' ORDER BY id DESC LIMIT 1");
    
    if (mysqli_num_rows($result) > 0) {
        $row        = mysqli_fetch_assoc($result);
        $last_number = intval(substr($row['patient_id'], -3)); 
        $new_number  = $last_number + 1;
    } else {
        $new_number = 1;
    }

    $patient_id = $prefix . str_pad($new_number, 3, '0', STR_PAD_LEFT);

    $sql = "INSERT INTO patients 
        (patient_id, first_name, last_name, email, phone, mobile, blood_group, sex, dob, address, status)
        VALUES 
        ('$patient_id', '$first_name', '$last_name', '$email', '$phone', '$mobile', '$blood', '$sex', '$dob', '$address', '$status')";

    $run = mysqli_query($conn, $sql);

    if ($run) {
        echo "<script>
                alert('Patient added successfully');
                window.location='patient.php';
              </script>";
}
?>
