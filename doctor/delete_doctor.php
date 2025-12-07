<?php

    include '../Database/connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM doctors WHERE id = '$id'";
    
    $run = mysqli_query($conn, $sql);

    if(!$run){
        echo 'delete operation failed!';
    } else{
        header("location: doctor_list.php");
    }

?>
