<?php
include("Database/connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$patient_id = $_POST['patient-id'];
$full_name  = $_POST['full-name'];
$doctor_name = $_POST['doctor-name'];
$mobile = $_POST['mobile'];
$ad = $_POST['ad'];
$address = $_POST['address'];


$check = "SELECT * FROM patients WHERE patient_id='$patient_id'";
$res = $conn->query($check);

if ($res->num_rows == 0) {
    die("Error: Patient ID does not exist.");
}


$sql = "INSERT INTO appointments (patient_id, full_name, doctor_name, mobile, appointment_date, address)
        VALUES ('$patient_id', '$full_name', '$doctor_name', '$mobile', '$ad', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Appointment Added Successfully!'); window.location.href='dashboard.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
