<?php
include '../Database/connection.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="patient_list.csv"');

$output = fopen("php://output", "w");


fputcsv($output, ['ID', 'Patient ID', 'First Name', 'Last Name', 'Email', 'Phone no', 'Mobile no', 'Blood Group', 'Sex', 'DOB', 'Address', 'Status']);

$query = "SELECT * FROM patients";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>
