<?php

include('koneksi.php');

if(isset($_POST['pem1']))
{
    $mahasiswa = $_SESSION['user']['nama'];
    $pem1 = $_POST['pem1'];
    $pem2 = $_POST['pem2'];
    $judul = $_POST['judul'];
    $ringkasan = $_POST['ringkasan'];
    $date = gmdate('Y-m-d');
    $timezone  = +7; //WIB
    $time = gmdate('H:i:s', time() + 3600*($timezone+date("I")));

    $prop="INSERT INTO proposal (id, date, time, nama, pembimbing1, pembimbing2, judul, ringkasan) VALUES (NULL, '$date', '$time', '$mahasiswa','$pem1','$pem2','$judul','$ringkasan')";

    if(mysqli_query($conn, $prop)){
        echo "uda";
    }else{
        echo "eror: " . mysqli_error($conn);
    }
}

?>