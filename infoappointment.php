<?php
include("Database/connection.php");

$patient_id = $_POST['patient-id'];
$full_name = $_POST['full-name'];
$doctor_name = $_POST['doctor-name'];
$mobile = $_POST['mobile'];
$ad = $_POST['ad'];
$address = $_POST['address'];

$sql = "INSERT INTO appointments (patient_id, full_name, doctor_name, mobile, appointment_date, address)
        VALUES ('$patient_id', '$full_name', '$doctor_name', '$mobile', '$ad', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Appointment Added Successfully!'); window.location.href='dashboard.php';</script>";
} else {
    echo "Error: Appoinment Failed.";
}
?>
