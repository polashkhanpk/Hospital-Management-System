<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../Database/connection.php';

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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Reception Dashboard</title>
    <link rel="stylesheet" href="../patient/style.css">
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
                    <li><a href="../patient/patient.php"><i class="fas fa-procedures"></i> Patient</a></li>
                    <li><a href="../patient/patient_list.php"><i class="fas fa-procedures"></i> Patient list</a></li>
                    <li><a href="../apointmentlist.php"><i class="fas fa-notes-medical"></i> Appointment list</a></li>
                    <li class="active"><a href="#"><i class="fas fa-money-bill"></i> Payment</a></li>
                    <li><a href="payment_list.php"><i class="fas fa-list"></i> Payment list</a></li>
                </ul>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="top-bar">
                <div class="page-title">
                    <h2>Dashboard Receptionist</h2>
                    <p>Add Payment</p>
                </div>
                <div class="header-actions">
                    <a href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </header>


<!-- Search section -->
<div style="margin: 15px 20px;">
    <form method="get" style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">

        <label>Search Type:</label>
        <select name="search_type">
            <option value="patient" <?php if($search_type=='patient') echo 'selected'; ?>>Patient</option>
        </select>

        <input type="text" name="search_text" 
               placeholder="Search by name or mobile" 
               value="<?php echo htmlspecialchars($search_text); ?>">

        <button type="submit" class="list-btn">Search</button>
        <a href="payment.php" class="list-btn">Reset</a>
    </form>
</div>



<?php
// SEARCH RESULTS OUTPUT
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
}

?>

<br>




        <div class="form-container">
            <form class="patient-form" action="add_payment_action.php" method="POST">

                <div class="form-group">
                    <label for="patient-id">Patient ID <span style="color:red;">*</span></label>
                    <input type="text" id="patient-id" name="patient-id" placeholder="Patient ID" required>
                    <small id="id-status" style="color:red;"></small>
                </div>

                <div class="form-group">
                    <label for="full-name">Full Name <span style="color:red;">*</span></label>
                    <input type="text" id="full-name" name="full-name" placeholder="Full Name" required>
                </div>

                <!-- BILLING SECTION -->
                <div class="form-group">
                    <label for="base_amount">Base Amount (৳) <span style="color:red;">*</span></label>
                    <input type="number" step="0.01" id="base_amount" name="base_amount" placeholder="Base amount" required>
                </div>

                <div class="form-group">
                    <label for="discount">Discount (৳)</label>
                    <input type="number" step="0.01" id="discount" name="discount" value="0">
                </div>

                <div class="form-group">
                    <label for="vat_percent">VAT (%)</label>
                    <input type="number" step="0.01" id="vat_percent" name="vat_percent" value="0">
                </div>

                <div class="form-group">
                    <label for="total_amount">Total Payable (৳)</label>
                    <input type="number" step="0.01" id="total_amount" name="total_amount" readonly>
                </div>

                <!-- PAYMENT REASON -->
                <div class="form-group">
                    <label for="reason">Reason for Payment <span style="color:red;">*</span></label>
                    <select id="reason" name="reason" required>
                        <option value="">Select</option>
                        <option value="consultation">Doctor Consultation</option>
                        <option value="test">Lab Test</option>
                        <option value="admission">Admission / Bed Charge</option>
                        <option value="surgery">Surgery / Procedure</option>
                        <option value="pharmacy">Pharmacy / Medicine</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="notes">Notes / Details</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="Extra details (test name, etc.)"></textarea>
                </div>

                <div class="form-group">
                    <label for="method">Payment Method <span style="color:red;">*</span></label>
                    <select id="method" name="method" required>
                        <option value="">Select Method</option>
                        <option value="cash">Cash</option>
                        <option value="bkash">bKash</option>
                        <option value="card">Card</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status <span style="color:red;">*</span></label>
                    <select id="status" name="status" required>
                        <option value="paid">Paid</option>
                        <option value="due">Due</option>
                        <option value="partial">Partial</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="reset" class="btn reset-btn">⟳ Reset</button>
                    <button type="submit" class="btn save-btn">⭗ Save</button>
                </div>

            </form>
        </div>

        </main>
    </div>


<script>
    // BILLING CALCULATION
    function calcTotal(){
        let base = parseFloat(document.getElementById('base_amount').value) || 0;
        let discount = parseFloat(document.getElementById('discount').value) || 0;
        let vatPercent = parseFloat(document.getElementById('vat_percent').value) || 0;

        if (discount > base) {
            discount = base;
            document.getElementById('discount').value = discount.toFixed(2);
        }

        let afterDiscount = base - discount;
        let vatAmount = afterDiscount * (vatPercent / 100);
        let total = afterDiscount + vatAmount;

        document.getElementById('total_amount').value = total.toFixed(2);
    }

    ['base_amount','discount','vat_percent'].forEach(function(id){
        document.getElementById(id).addEventListener('input', calcTotal);
    });

    calcTotal();
</script>
</body>
</html>
