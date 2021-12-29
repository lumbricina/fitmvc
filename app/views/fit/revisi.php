<?php

include('koneksi.php');

if(isset($_POST['pem2']))
{
    $isirevisi = $_POST['isirevisi'];
    ##$query = "SELECT * FROM proposal";
    $pem1 = $_POST['pem1'];
    $nama = $_POST['mhs'];
    $pem2= $_POST['pem2'];


    $props="UPDATE proposal SET revisi='$isirevisi', pembimbing2='$pem2', status='2' WHERE nama='$nama' && pembimbing1='$pem1'";

    if(mysqli_query($conn, $props)){
        #echo "uda";
        header('location:proposal');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:proposal');
    }
}

?>