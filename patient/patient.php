<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Reception Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo-section">
                <div class="l1">
                    <img src="../Hospital LOGO.png" alt="" width="50px">
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
                    <li><a href="../dashboard.php"><i class="fas fa-chart-line"></i> Dashboard</a></li>
                    <li><a href="../doctor/doctor.php"><i class="fas fa-user-md"></i> Doctor</a></li>
                    <li><a href="../doctor/doctor_list.php"><i class="fas fa-user-md"></i> Doctor list</a></li>
                    <li class="active"><a href="#"><i class="fas fa-procedures"></i> Patient</a></li>
                    <li><a href="patient_list.php"><i class="fas fa-procedures"></i> Patient list</a></li>
                    <li><a href="../apointmentlist.php"><i class="fas fa-notes-medical"></i> Appointment list</a></li>
                    <li><a href="../payment/payment.php"><i class="fas fa-money-bill"></i> Payment</a></li>
                    <li><a href="../payment/payment_list.php"><i class="fas fa-list"></i> Payment list</a></li>
                </ul>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-bar">
                <div class="page-title">
                    <h2>Dashboard Receptionist</h2>
                    <p>Add Patient</p>
                </div>
                <div class="header-actions">
                    <a href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </header>

      <div class="form-container">
        <header>
            <a href="patient_list.php" class="list-btn">Patient List</a>
        </header>

        <form class="patient-form" action="add_patient.php" method="POST">

            <div class="form-group">
                <label for="first-name">First Name <span style="color:red;">*</span></label>
                <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
            </div>

            <div class="form-group">
                <label for="last-name">Last Name <span style="color:red;">*</span></label>
                <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address <span style="color:red;">*</span></label>
                <input type="email" id="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone No</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone No">
            </div>

            <div class="form-group">
                <label for="mobile">Mobile No <span style="color:red;">*</span></label>
                <input type="tel" id="mobile" name="mobile" placeholder="Mobile No" required>
            </div>

            <div class="form-group">
                <label for="blood-group">Blood Group <span style="color:red;">*</span></label>
                <select id="blood-group" name="blood-group">
                    <option value="">Select option</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    </select>
            </div>

            <div class="form-group inline-group">
                <label>Sex <span style="color:red;">*</span></label>
                <div class="radio-options">
                    <input type="radio" id="sex-male" name="sex" value="male" required>
                    <label for="sex-male">Male</label>

                    <input type="radio" id="sex-female" name="sex" value="female">
                    <label for="sex-female">Female</label>

                    <input type="radio" id="sex-other" name="sex" value="other">
                    <label for="sex-other">Other</label>
                </div>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth <span style="color:red;">*</span></label>
                <input type="date" id="dob" name="dob" value="Select DOB" required>
            </div>
            
            <div class="form-group">
                <label for="address">Address <span style="color:red;">*</span></label>
                <textarea id="address" name="address" rows="4" placeholder="Address" required></textarea>
            </div>

            <div class="form-group inline-group status-group">
                <label>Status</label>
                <div class="radio-options">
                    <input type="radio" id="status-active" name="status" value="active" checked>
                    <label for="status-active">Active</label>

                    <input type="radio" id="status-inactive" name="status" value="inactive">
                    <label for="status-inactive">Inactive</label>
                </div>
            </div>

            <div class="form-actions">
                <button type="reset" class="btn reset-btn">⟳ Reset</button>
                <button type="submit" class="btn save-btn">⭗ Save</button>
            </div>

        </form>
    </div>

        </main>
    </div>

</body>
</html>
