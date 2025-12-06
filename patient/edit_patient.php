<?php
session_start();
include '../Database/connection.php';
$id = $_GET['id'];

$query = "SELECT * FROM patients WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$patient = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
</head>
<body>

<div class="edit-container">
    <h2>Edit Patient</h2>

    <form class="edit-form" action="update_patient.php" method="POST">

        <input type="hidden" name="id" value="<?= $patient['id'] ?>">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="<?= $patient['first_name'] ?>">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?= $patient['last_name'] ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $patient['email'] ?>">
        </div>

        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?= $patient['mobile'] ?>">
        </div>

        <div class="form-group full-row">
             <label>Status</label>
    <select name="status">
        <option <?= ($patient['status'] == "active") ? "selected" : "" ?>>active</option>
        <option <?= ($patient['status'] == "inactive") ? "selected" : "" ?>>inactive</option>
    </select>
        </div>

        <div class="form-group full-row">
            <label>Address</label>
            <textarea name="address" rows="3"><?= $patient['address'] ?></textarea>
        </div>

        <div class="allbutton">
            <button class="btn save-btn" type="submit">Save Changes</button>
            <a style='text-decoration: none;' href="patient_list.php" class="btn cancel-btn">Cancel</a>
        </div>

    </form>
</div>


</body>
</html>
