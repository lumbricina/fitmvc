<?php

include('koneksi.php');

if(isset($_POST['setujui']))
{
    $isirevisi = $_REQUEST['isirevisi'];
    ##$query = "SELECT * FROM proposal";
    $pem1 = $_REQUEST['pem1'];
    $nama = $_REQUEST['mhs'];
    $pem2= $_REQUEST['pem2'];

    
    $mahasiswa = $_POST['mahasiswa'];
    $date = gmdate('Y-m-d');
    $timezone  = +7; //WIB
    $time = gmdate('H:i:s', time() + 3600*($timezone+date("I")));

    $jadwal="INSERT INTO jadwalsidang (id, tanggal, waktu, mahasiswa) VALUES (NULL, '$date', '$time', '$mahasiswa')";

    if(mysqli_query($conn, $jadwal)){
        header('location:jadwalsidang');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:jadwalsidang');
    }
}

?>