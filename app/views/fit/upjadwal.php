<?php

include('koneksi.php');

if(isset($_POST['pen1']))
{
    $mahasiswa = $_POST['mahasiswa'];
    $pen1 = $_POST['pen1'];
    $pen2 = $_POST['pen2'];
    $pen3 = $_POST['pen3'];
    $date = $_POST['date']; //gmdate('Y-m-d');
    $timezone  = +7; //WIB
    $time = $_POST['time']; //gmdate('H:i:s', $_POST['time'] + 3600*($timezone+date("I")));

    $jadwal="INSERT INTO jadwalsidang (id, tanggal, waktu, mahasiswa, penilai1, penilai2, penilai3) VALUES (NULL, '$date', '$time', '$mahasiswa', '$pen1', '$pen2', '$pen3') ";

    if(mysqli_query($conn, $jadwal)){
        header('location:jadwalsidang');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:jadwalsidang');
    }
}

?>