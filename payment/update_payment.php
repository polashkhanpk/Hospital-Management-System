<?php
session_start();
include '../Database/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $patient_id = $_POST['patient_id'];
    $full_name = $_POST['full_name'];
    $amount = $_POST['amount'];
    $method = $_POST['method'];
    $paid_date = $_POST['paid_date'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    $query = "UPDATE payments SET patient_id = '$patient_id', full_name = '$full_name', amount = '$amount', method = '$method',  paid_date = '$paid_date', status = '$status', notes= '$notes' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Payment updated successfully!');
                window.location.href='payment_list.php';
              </script>";
    } else {
        echo "Error: Failed to update.";
    }
}
?>
