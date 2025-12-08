<?php
session_start();
include '../Database/connection.php';

$query  = "SELECT * FROM payments ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment List</title>
    <link rel="stylesheet" href="../for_style/apointmentlist.css">
    <style>
        .exit{
           padding-left: 1600px;
           padding-bottom: 22px;
        }

        .buttone{
            text-decoration: none;
            background: #ff0000ff;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h2>All Payments</h2>
<div class="two" style="display: flex;">
    <div class="download-button">
        <a href="export_payment_csv.php" class="csv_button">Download CSV</a>
    </div>
    <div class="exit">
        <a href="payment.php" class="buttone">EXIT</a>
    </div>
</div>

<table class="patient-table">
    <thead>
        <tr>
            <th>Patient ID</th>
            <th>Full Name</th>
            <th>Discount + VAT</th>
            <th>Final Amount</th>
            <th>Method</th>
            <th>Date</th>
            <th>Status</th>
            <th>Reason</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['patient_id'] ?></td>
                <td><?= $row['full_name'] ?></td>
                <td>
                    Discount: ৳<?= $row['discount'] ?><br>
                    VAT: ৳<?= $row['vat'] ?>
                </td>
                <td>৳<?= $row['amount'] ?></td>
                <td><?= $row['method'] ?></td>
                <td><?= $row['paid_date'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><?= $row['reason'] ?></td>
                <td>
                    <a class="action-button" href="edit_payment.php?id=<?= $row['id'] ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
