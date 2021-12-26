<?php

include('koneksi.php');

if(isset($_POST['mahasiswa']))
{
    $mahasiswa = $_POST['mahasiswa'];
    $date = $_POST['date']; //gmdate('Y-m-d');
    $timezone  = +7; //WIB
    $time = $_POST['time']; //gmdate('H:i:s', $_POST['time'] + 3600*($timezone+date("I")));

    $jadwal="INSERT INTO jadwalsidang (id, tanggal, waktu, mahasiswa) VALUES (NULL, '$date', '$time', '$mahasiswa') ";

    if(mysqli_query($conn, $jadwal)){
        header('location:jadwalsidang');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:jadwalsidang');
    }
}

?>