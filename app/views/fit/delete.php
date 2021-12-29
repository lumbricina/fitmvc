<?php 

include('koneksi.php');

if(isset($_POST['id_lobi']))
{   $id_lobi = $_POST['id_lobi'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $isi = $_POST['isi'];
    $file =  $_POST['filename'];
    $remove = unlink('uploadLobi/'.$file);

    $deletelobi="DELETE FROM lobi WHERE lobi.id_lobi = '$id_lobi'";

    if(mysqli_query($conn, $deletelobi)){
        header('location:lobi');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:lobi');
    }
}
?>