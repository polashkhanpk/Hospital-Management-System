<?php
session_start();
include 'Database/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $full_name = $_POST['full-name'];
    $doctor_name = $_POST['doctor-name'];
    $mobile = $_POST['mobile'];
    $ad = $_POST['ad'];
    $address = $_POST['address'];

    $sql = "UPDATE appointments SET full_name = '$full_name', doctor_name = '$doctor_name', mobile = '$mobile', appointment_date = '$ad', address = '$address' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Appointment updated successfully!');
                window.location.href='apointmentlist.php';
              </script>";
    } else {
        echo 'Error: Failed to update ';
    }
}
?>
