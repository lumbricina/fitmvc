<?php

include('koneksi.php');

if(isset($_REQUEST['isi']))
{
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $isi = $_REQUEST['isi'];


    $updatelobi="UPDATE lobi SET date='$date' time='$time' isi='$isi', WHERE nama='$nama'";

    if(mysqli_query($conn, $updatelobi)){
        header('location:lobi');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:lobi');
    }
}

?>