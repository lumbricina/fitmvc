<?php

include('koneksi.php');

if(isset($_REQUEST['isi']))
{   $id_lobi = $_REQUEST['id_lobi'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $isi = $_REQUEST['isi'];

    $updatelobi="UPDATE lobi SET date='$date', time='$time', isi='$isi' WHERE id_lobi='$id_lobi'";

    if(mysqli_query($conn, $updatelobi)){
        header('location:lobi');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:lobi');
    }
}

?>