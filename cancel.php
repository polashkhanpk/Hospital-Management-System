<?php

    include 'Database/connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM appointments WHERE id = '$id'";
    
    $run = mysqli_query($conn, $sql);

    if(!$run){
        echo 'delete operation failed!';
    } else{
        echo "<script>
            alert('Apointment Cancel successfully!');
            window.location.href='apointmentlist.php';
          </script>";
    }

?>
