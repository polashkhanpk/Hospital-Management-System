<?php
session_start();
include '../Database/connection.php';
$id = $_GET['id'];
$query   = "SELECT * FROM payments WHERE id = '$id'";
$result  = mysqli_query($conn, $query);
$payment = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Payment</title>
</head>
<body>

<div class="edit-container">
    <h2>Edit Payment</h2>

    <form class="edit-form" action="update_payment.php" method="POST">

        <input type="hidden" name="id" value="<?= $payment['id'] ?>">

        <div class="form-group">
            <label>Patient ID</label>
            <input type="text" name="patient_id" value="<?= $payment['patient_id'] ?>" readonly>
        </div>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?= $payment['full_name'] ?>">
        </div>

        <div class="form-group">
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" value="<?= $payment['amount'] ?>">
        </div>

        <div class="form-group">
            <label>Payment Method</label>
            <select name="method">
                <option value="">Select</option>
                <option value="cash"  <?= $payment['method']=='cash'  ? 'selected' : '' ?>>Cash</option>
                <option value="bkash" <?= $payment['method']=='bkash' ? 'selected' : '' ?>>bKash</option>
                <option value="card"  <?= $payment['method']=='card'  ? 'selected' : '' ?>>Card</option>
            </select>
        </div>

        <div class="form-group full-row">
            <label>Paid Date</label>
            <input type="date" name="paid_date" value="<?= $payment['paid_date'] ?>">
        </div>

        <div class="form-group full-row">
            <label>Status</label>
            <select name="status">
                <option value="paid"    <?= $payment['status']=='paid'    ? 'selected' : '' ?>>paid</option>
                <option value="due"     <?= $payment['status']=='due'     ? 'selected' : '' ?>>due</option>
                <option value="partial" <?= $payment['status']=='partial' ? 'selected' : '' ?>>partial</option>
            </select>
        </div>

        <div class="form-group full-row">
            <label>Notes</label>
            <textarea name="notes" rows="3"><?= $payment['notes'] ?></textarea>
        </div>

        <div class="allbutton">
            <button class="btn save-btn" type="submit">Save Changes</button>
            <a style='text-decoration: none;' href="payment_list.php" class="btn cancel-btn">Cancel</a>
        </div>

    </form>
</div>

</body>
</html>
