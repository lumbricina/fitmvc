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

    $temp = $_FILES['file1']['tmp_name'];
    $filename = date(time()).$_FILES['file1']['name'];
    $ukuran = $_FILES['file1']['size'];
    $type = $_FILES['file1']['type'];
    $folder = "uploadLobi/";

    if ($ukuran < 1044070){
        move_uploaded_file($temp, $folder . $filename);
    }

    $prop="INSERT INTO proposal (id, date, time, nama, pembimbing1, pembimbing2, judul, ringkasan, status, filename) VALUES (NULL, '$date', '$time', '$mahasiswa','$pem1','$pem2','$judul','$ringkasan','1', '$filename')";

    if(mysqli_query($conn, $prop)){
        header('location:pengajuan');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:pengajuan');
    }
}

?>