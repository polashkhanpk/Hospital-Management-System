<?php
include '../Database/connection.php';

header('Content-Disposition: attachment; filename="doctor_list.csv"');

$output = fopen("php://output", "w");

fputcsv($output, ['ID', 'Doctor ID', 'First Name', 'Last Name', 'Email', 'Phone no', 'Mobile no', 'Blood Group', 'Sex', 
                  'DOB', 'Designation', 'Department','Specialist','Address', 'Status']);

$query = "SELECT * FROM doctors";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
exit;
?>
