<?php
include '../Database/connection.php';

$id          = $_POST['id'];
$first_name  = $_POST['first_name'];
$last_name   = $_POST['last_name'];
$email       = $_POST['email'];
$mobile      = $_POST['mobile'];
$blood_group = $_POST['blood_group'];
$sex         = $_POST['sex'];
$dob         = $_POST['dob'];
$status      = $_POST['status'];
$address     = $_POST['address'];

$query = "UPDATE patients SET first_name = '$first_name', last_name = '$last_name', email= '$email', mobile = '$mobile', blood_group = '$blood_group', sex = '$sex', dob = '$dob', status = '$status', address = '$address' WHERE id = '$id'";

if (mysqli_query($conn, $query)){
    echo "<script>
            alert('Patient updated successfully!');
            window.location.href='patient_list.php';
          </script>";
} else {
    echo "Error: Failed to update.";
}
?>
