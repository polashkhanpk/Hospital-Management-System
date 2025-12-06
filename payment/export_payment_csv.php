<?php
include '../Database/connection.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="payment_list.csv"');

$output = fopen("php://output", "w");

fputcsv($output, ['ID', 'Patient ID', 'Full Name', 'Amount', 'Discount', 'VAT', 'Method', 'Paid Date', 'Status', 'Reason', 'Notes']);

$query = "SELECT * FROM payments";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, [
        $row['id'],
        $row['patient_id'],
        $row['full_name'],
        $row['amount'],
        $row['discount'],
        $row['vat'],
        $row['method'],
        $row['paid_date'],
        $row['status'],
        $row['reason'],
        $row['notes']
    ]);
}

fclose($output);
exit;
?>
