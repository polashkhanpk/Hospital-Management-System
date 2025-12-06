<?php
session_start();
include '../Database/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient_id = $_POST['patient-id'];
    $full_name  = $_POST['full-name'];

    $base_amount = floatval($_POST['base_amount']);
    $discount    = floatval($_POST['discount']);
    $vat_percent = floatval($_POST['vat_percent']);
    $total_from_form = floatval($_POST['total_amount']);

    $method  = $_POST['method'];
    $status  = $_POST['status'];
    $reason  = $_POST['reason'];
    $notes   = $_POST['notes'];

    $date = date("Y-m-d");


    $check = "SELECT * FROM patients WHERE patient_id='$patient_id'";
    $res   = mysqli_query($conn, $check);

    if (mysqli_num_rows($res) == 0) {
        echo "<script>alert('Patient ID does not exist'); window.location.href='payment.php';</script>";
        exit();
    }

    if ($discount > $base_amount) {
        $discount = $base_amount;
    }

    $afterDiscount = $base_amount - $discount;
    $vat_amount    = $afterDiscount * ($vat_percent / 100);
    $final_amount  = $afterDiscount + $vat_amount;

    $sql = "INSERT INTO payments 
            (patient_id, full_name, amount, discount, vat, method, paid_date, status, reason, notes)
            VALUES 
            ('$patient_id', '$full_name', '$final_amount', '$discount', '$vat_amount', '$method', '$date', '$status', '$reason', '$notes')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Payment added successfully');
                window.location.href='payment_list.php';
              </script>";
    } else {
        echo 'Error: Payment failed ';
    }
}
?>
