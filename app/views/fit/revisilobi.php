<?php

include('koneksi.php');

if(isset($_REQUEST['isirevisi']))
{
    $isirevisi = $_REQUEST['isirevisi'];
    ##$query = "SELECT * FROM proposal";
    $nama = $_REQUEST['nama'];
    $date = $_REQUEST['date'];
    $time= $_REQUEST['time'];


    $props="UPDATE lobi SET revisi='$isirevisi', status='2' WHERE nama='$nama' && date='$date' && time='$time'";

    if(mysqli_query($conn, $props)){
        #echo "uda";
        header('location:lobidosen');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:lobidosen');
    }
}

?>