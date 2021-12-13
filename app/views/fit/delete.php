<?php 

include('koneksi.php');

if(isset($_REQUEST['btn_delete']))
{   $id_lobi = $_REQUEST['id_lobi'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $isi = $_REQUEST['isi'];

    $deletelobi="DELETE * FROM lobi WHERE id_lobi = '$id_lobi'";

    if(mysqli_query($conn, $deletelobi)){
        header('location:lobi');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:lobi');
    }
}

?>