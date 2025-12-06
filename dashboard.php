<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'Database/connection.php';

$patients_q = mysqli_query($conn, "SELECT COUNT(*) AS c FROM patients");
$patients = mysqli_fetch_assoc($patients_q)['c'];

$doctors_q = mysqli_query($conn, "SELECT COUNT(*) AS c FROM doctors");
$doctors = mysqli_fetch_assoc($doctors_q)['c'];

$appt_q = mysqli_query($conn, "SELECT COUNT(*) AS c FROM appointments WHERE appointment_date = CURDATE()");
$today_appt = mysqli_fetch_assoc($appt_q)['c'];


$search_type = "";
$search_text = "";
$patient_result = null;
$doctor_result = null;

if (isset($_GET['search_text']) && $_GET['search_text'] != "") {

    $search_text = $_GET['search_text'];
    $search_type = $_GET['search_type'];

    if ($search_type == "patient") {
        $sql = "SELECT * FROM patients 
                WHERE first_name LIKE '%$search_text%' 
                   OR last_name LIKE '%$search_text%' 
                   OR mobile LIKE '%$search_text%' 
                   OR phone LIKE '%$search_text%'";
        $patient_result = mysqli_query($conn, $sql);
    } 
    else if ($search_type == "doctor") {
        $sql = "SELECT * FROM doctors 
                WHERE first_name LIKE '%$search_text%' 
                   OR last_name LIKE '%$search_text%' 
                   OR mobile LIKE '%$search_text%' 
                   OR phone LIKE '%$search_text%'";
        $doctor_result = mysqli_query($conn, $sql);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Reception Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo-section">
                <div class="l1">
                    <img src="Hospital LOGO.png" alt="" width="50px">
                </div>
                <div class="l2">
                    evercare Hospital
                </div>
            </div>
            <div class="user-profile">
                <div class="user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="user-info">
                    <strong><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></strong>
                    <span><?php echo $_SESSION['role']; ?></span>
                </div>
            </div>
            <nav class="main-nav">
                <ul>
                    <li class="active"><a href="#"><i class="fas fa-chart-line"></i> Dashboard</a></li>
                    <li><a href="doctor/doctor.php"><i class="fas fa-user-md"></i> Doctor</a></li>
                    <li><a href="doctor/doctor_list.php"><i class="fas fa-user-md"></i> Doctor list</a></li>
                    <li><a href="patient/patient.php"><i class="fas fa-procedures"></i> Patient</a></li>
                    <li><a href="patient/patient_list.php"><i class="fas fa-procedures"></i> Patient list</a></li>
                    <li><a href="apointmentlist.php"><i class="fas fa-notes-medical"></i> Appointment list</a></li>
                    <li><a href="payment/payment.php"><i class="fas fa-money-bill"></i> Payment</a></li>
                    <li><a href="payment/payment_list.php"><i class="fas fa-list"></i> Payment list</a></li>

                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-bar">
                <div class="page-title">
                    <h2>Dashboard - <?php echo $_SESSION['role']; ?></h2>
                    <p>For Appointment</p>
                </div>
                <div class="header-actions">
                    <a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </header>


            <div class="stats-row">
    <div class="stat-card">Total Patients: <?php echo $patients; ?></div>
    <div class="stat-card">Total Doctors: <?php echo $doctors; ?></div>
    <div class="stat-card">Today’s Appointments: <?php echo $today_appt; ?></div>
</div>


<!-- Search section -->
<div style="margin: 15px 20px;">
    <form method="get" style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">

        <label>Search Type:</label>
        <select name="search_type">
            <option value="patient" <?php if($search_type=='patient') echo 'selected'; ?>>Patient</option>
            <option value="doctor"  <?php if($search_type=='doctor')  echo 'selected'; ?>>Doctor</option>
        </select>

        <input type="text" name="search_text" 
               placeholder="Search by name or mobile" 
               value="<?php echo htmlspecialchars($search_text); ?>">

        <button type="submit" class="button">Search</button>
        <a href="dashboard.php" class="button">Reset</a>
    </form>
</div>



<?php

// --------- SEARCH RESULTS OUTPUT ----------
if ($search_text != "" && $search_type == "patient") {

    echo "<div style='margin: 0 20px;'>";
    echo "<h3>Patient Search Result</h3>";

    if ($patient_result && mysqli_num_rows($patient_result) > 0) {

        echo "<table border='1' cellpadding='5' cellspacing='0' style='width:100%; border-collapse:collapse; text-align: center;'>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Blood Group</th>
                    <th>Sex</th>
                    <th>Date of birth</th>
                    <th>Address</th>
                </tr>";

        while($row = mysqli_fetch_assoc($patient_result)){
            echo "<tr>
                    <td>".$row['patient_id']."</td>
                    <td>".$row['first_name']." ".$row['last_name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['mobile']."</td>
                    <td>".$row['blood_group']."</td>
                    <td>".$row['sex']."</td>
                    <td>".$row['dob']."</td>
                    <td>".$row['address']."</td>
                  </tr>";
        }

        echo "</table>";

    } else {
        echo "<p>No patient found.</p>";
    }

    echo "</div>";
}

if ($search_text != "" && $search_type == "doctor") {

    echo "<div style='margin: 0 20px;'>";
    echo "<h3>Doctor Search Result</h3>";

    if ($doctor_result && mysqli_num_rows($doctor_result) > 0) {

        echo "<table border='1' cellpadding='5' cellspacing='0' style='width:100%; border-collapse:collapse;'>
                <tr>
                    <th>ID</th>
                    <th>Doctor ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Department</th>
                    <th>Specialist</th>
                </tr>";

        while($row = mysqli_fetch_assoc($doctor_result)){
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['doctor_id']."</td>
                    <td>".$row['first_name']." ".$row['last_name']."</td>
                    <td>".$row['mobile']."</td>
                    <td>".$row['department']."</td>
                    <td>".$row['specialist']."</td>
                  </tr>";
        }

        echo "</table>";

    } else {
        echo "<p>No doctor found.</p>";
    }

    echo "</div>";
}
?>

<br>
            

      <div class="form-container">

        <header>
            <a href="apointmentlist.php" class="button">Appointment List</a>
        </header>

        <form class="patient-form" action="infoappointment.php" method="POST">

            <div class="form-group">
                <label for="patient-id">Patient ID <span style="color:red;">*</span></label>
                <input type="text" id="patient-id" name="patient-id" placeholder="Patient ID" required>
            </div>


            <div class="form-group">
                <label for="full-name">Full Name <span style="color:red;">*</span></label>
                <input type="text" id="full-name" name="full-name" placeholder="Full Name">
            </div>


            <div class="form-group">
                <label for="doctor-name">Doctor Name <span style="color:red;">*</span></label>
                <input type="text" id="doctor-name" name="doctor-name" placeholder="Doctor Name" required>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile No <span style="color:red;">*</span></label>
                <input type="tel" id="mobile" name="mobile" placeholder="Mobile No">
            </div>

            <div class="form-group">
                <label for="ad">Appointment Date <span style="color:red;">*</span></label>
                <input type="date" id="ad" name="ad" value="Select Your Appointment Date" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address <span style="color:red;">*</span></label>
                <textarea id="address" name="address" rows="4" placeholder="Address"></textarea>
            </div>

            <div class="form-actions">
                <button type="reset" class="button reset-btn">⟳ Reset</button>
                <button type="submit" class="button save-btn">⭗ Save</button>
            </div>

        </form>
    </div>

        </main>
    </div>
    <script>
        let today = new Date().toISOString().split("T")[0];
        document.getElementById("ad").setAttribute("min", today);
    </script>

</body>
</html>
