<?php
session_start();
include 'Database/connection.php';
$id = $_GET['id'];


$query  = "SELECT * FROM appointments WHERE id = '$id'";
$result = mysqli_query($conn, $query);

$appointment = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
</head>
<body>

<div class="edit-container">
    <h2>Edit Appointment</h2>

    <form action="update_apointment.php" method="post" class="edit-form">

        <input type="hidden" name="id" value="<?= $appointment['id'] ?>">

        <div class="form-group">
            <label>Patient ID</label>
            <input type="text" name="patient-id" value="<?= $appointment['patient_id'] ?>">
        </div>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full-name" value="<?= $appointment['full_name'] ?>">
        </div>

        <div class="form-group">
            <label>Doctor Name</label>
            <input type="text" name="doctor-name" value="<?= $appointment['doctor_name'] ?>">
        </div>

        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?= $appointment['mobile'] ?>">
        </div>

        <div class="form-group">
            <label>Appointment Date</label>
            <input type="date" name="ad" value="<?= $appointment['appointment_date'] ?>">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="3"><?= $appointment['address'] ?></textarea>
        </div>

        <div class="allbutton">
            <button class="btn save-btn" type="submit">Save Changes</button>
            <a style='text-decoration: none;' href="apointmentlist.php" class="btn cancel-btn">Cancel</a>
        </div>

    </form>
</div>

</body>
</html>
