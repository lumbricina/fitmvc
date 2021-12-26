<?php 

include('koneksi.php');

if(isset($_POST['id_lobi']))
{   $id_lobi = $_POST['id_lobi'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $isi = $_POST['isi'];

    $deletelobi="DELETE FROM lobi WHERE lobi.id_lobi = '$id_lobi'";

    if(mysqli_query($conn, $deletelobi)){
        header('location:lobi');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:lobi');
    }
}

else if(isset($_POST['id']))
{   $id = $_POST['id'];
    $date = $_POST['tanggal'];
    $time = $_POST['waktu'];
    $isi = $_POST['mahasiswa'];

    $deletesidang="DELETE FROM jadwalsidang WHERE jadwalsidang.id = '$id'";

    if(mysqli_query($conn, $deletesidang)){
        header('location:jadwalsidang');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:jadwalsidang');
    }
}


?>