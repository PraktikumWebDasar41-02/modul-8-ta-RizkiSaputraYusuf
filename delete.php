<?php
    require_once("koneksi.php");

    $nim     = $_GET['nim'];
    $delete = "DELETE FROM datadiri WHERE nim='$nim'"; 

    if (mysqli_query($conn, $delete)) {
        header("location: dashboard.php");
    }else {
        echo "Error: " . $delete . "<br?" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>