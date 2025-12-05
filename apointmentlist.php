<?php
include 'Database/connection.php';

$query  = "SELECT * FROM appointments ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointments List</title>
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
            border-radius: 4px;
        }
    </style>
</head>
<body>

<h2>All Appointments List</h2>

<div class="two" style="display: flex;">
    <div class="download-btns">
        <a href="appointment_export_csv.php">Download CSV</a>
    </div>
    <div class="exit">
        <a href="dashboard.php" class="buttone">EXIT</a>
    </div>
</div>

<table class="patient-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Mobile</th>
            <th>Appointment Date</th>
            <th>Address</th>
            <th>Action</th>

        </tr>
    </thead>

    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['patient_id'] ?></td>
                <td><?= $row['full_name'] ?></td>
                <td><?= $row['doctor_name'] ?></td>
                <td><?= $row['mobile'] ?></td>
                <td><?= $row['appointment_date'] ?></td>
                <td><?= $row['address'] ?></td>
                <td>
                    <ahref="#">Edit</a> |
                    <ahref="#>">Cancel appointment</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
