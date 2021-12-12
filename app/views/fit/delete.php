<?php 

include('koneksi.php');

if(isset($_REQUEST['isi']))
{   $id_lobi = $_REQUEST['id_lobi'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $isi = $_REQUEST['isi'];

    $lobidel="DELETE FROM `lobi` WHERE `lobi`.`id_lobi` = `$id_lobi`";

    if(mysqli_query($conn, $lobidel)){
        header('location:lobi');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:lobi');
    }
}

?>