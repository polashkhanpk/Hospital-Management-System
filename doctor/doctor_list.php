<?php
include '../Database/connection.php';

$query = "SELECT * FROM doctors ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctors List</title>
    <link rel="stylesheet" href="list_style.css">
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

<h2>All Doctors List</h2>

<div class="two" style="display: flex;">
    <div class="download-btns">
        <a href="export_csv.php" class="btn csv-btn">Download CSV</a>
    </div>
    <div class="exit">
        <a href="doctor.php" class="buttone">EXIT</a>
    </div>
</div>

<table class="patient-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Doctor ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Blood Group</th>
            <th>Sex</th>
            <th>DOB</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Specialist</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['doctor_id'] ?></td>
                <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile'] ?></td>
                <td><?= $row['blood_group'] ?></td>
                <td><?= $row['sex'] ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['designation'] ?></td>
                <td><?= $row['department'] ?></td>
                <td><?= $row['specialist'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a class="edit-btn" href="edit_doctor.php?id=<?= $row['id'] ?>">Edit</a> /
                    <a class="edit-btn" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>    
</html>
