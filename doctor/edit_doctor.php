<?php
session_start();
include '../Database/connection.php';

$id = $_GET['id'];


$query  = "SELECT * FROM doctors WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) != 1) {
    die("Doctor not found!");

$doctor = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="edit_style.css">
</head>
<body>

<div class="edit-container">
    <h2>Edit Doctor</h2>
    <form action="update_doctor.php" method="post">
        <input type="hidden" name="id" value="<?= $doctor['id'] ?>">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" value="<?= $doctor['first_name'] ?>">
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?= $doctor['last_name'] ?>">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $doctor['email'] ?>">
        </div>

        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" value="<?= $doctor['mobile'] ?>">
        </div>
        <div class="form-group">
            <label>Blood Group</label>
            <select name="blood_group">
                <option value="">Select</option>
                <option value="A+" <?= $doctor['blood_group']=='A+'?'selected':'' ?>>A+</option>
                <option value="A-" <?= $doctor['blood_group']=='A-'?'selected':'' ?>>A-</option>
                <option value="B+" <?= $doctor['blood_group']=='B+'?'selected':'' ?>>B+</option>
                <option value="B-" <?= $doctor['blood_group']=='B-'?'selected':'' ?>>B-</option>
                <option value="AB+" <?= $doctor['blood_group']=='AB+'?'selected':'' ?>>AB+</option>
                <option value="AB-" <?= $doctor['blood_group']=='AB-'?'selected':'' ?>>AB-</option>
                <option value="O+" <?= $doctor['blood_group']=='O+'?'selected':'' ?>>O+</option>
                <option value="O-" <?= $doctor['blood_group']=='O-'?'selected':'' ?>>O-</option>
            </select>
        </div>

        <div class="form-group">
            <label>Sex</label>
            <select name="sex">
                <option <?= ($doctor['sex'] == "male") ? "selected" : "" ?>>male</option>
                <option <?= ($doctor['sex'] == "female") ? "selected" : "" ?>>female</option>
                <option <?= ($doctor['sex'] == "other") ? "selected" : "" ?>>other</option>
            </select>
        </div>

        <div class="form-group">
            <label>DOB</label>
            <input type="date" name="dob" value="<?= $doctor['dob'] ?>">
        </div>

        <div class="form-group">
            <label>Designation</label>
            <input type="text" name="designation" value="<?= $doctor['designation'] ?>">
        </div>

        <div class="form-group">
            <label>Department</label>
            <input type="text" name="department" value="<?= $doctor['department'] ?>">
        </div>

        <div class="form-group">
            <label>Specialist</label>
            <input type="text" name="specialist" value="<?= $doctor['specialist'] ?>">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="active"   <?= $doctor['status']=='active'?'selected':'' ?>>Active</option>
                <option value="inactive" <?= $doctor['status']=='inactive'?'selected':'' ?>>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="3"><?= $doctor['address'] ?></textarea>
        </div>

        <div class="button-group">
            <button class="btn save-btn" type="submit">Save Changes</button>
            <a href="doctor_list.php" class="btn cancel-btn">Cancel</a>
        </div>
    </form>
   </div>
</body>
</html>
