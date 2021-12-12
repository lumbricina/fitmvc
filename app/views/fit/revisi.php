<?php

include('koneksi.php');

if(isset($_REQUEST['isirevisi']))
{
    $isirevisi = $_REQUEST['isirevisi'];
    ##$query = "SELECT * FROM proposal";
    $pem1 = $_REQUEST['pem1'];
    $nama = $_REQUEST['mhs'];
    $pem2= $_REQUEST['pem2'];


    $props="UPDATE proposal SET revisi='$isirevisi', status='2' WHERE nama='$nama' && pembimbing1='$pem1' && pembimbing2='$pem2'";

    if(mysqli_query($conn, $props)){
        #echo "uda";
        header('location:proposal');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:proposal');
    }
}

?>