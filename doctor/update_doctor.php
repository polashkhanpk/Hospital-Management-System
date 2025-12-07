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
$designation = $_POST['designation'];
$department  = $_POST['department'];
$specialist  = $_POST['specialist'];
$status      = $_POST['status'];
$address     = $_POST['address'];

$query = "UPDATE doctors SET 
            first_name  = '$first_name',
            last_name   = '$last_name',
            email       = '$email',
            mobile      = '$mobile',
            blood_group = '$blood_group',
            sex         = '$sex',
            dob         = '$dob',
            designation = '$designation',
            department  = '$department',
            specialist  = '$specialist',
            status      = '$status',
            address     = '$address'
          WHERE id = '$id'";

if (mysqli_query($conn, $query)){
    echo "<script>
            alert('Doctor updated successfully!');
            window.location.href='doctor_list.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

