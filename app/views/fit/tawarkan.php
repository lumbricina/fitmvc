<?php

include('koneksi.php');

if(isset($_POST['tawaranjdl']))
{
    $dosen = $_SESSION['user']['nama'];
    $tawaranjdl = $_POST['tawaranjdl'];
    
    $tawarin="INSERT INTO tawarandosen (id, penawaran, dosen) VALUES (NULL, '$tawaranjdl', '$dosen')";

    if(mysqli_query($conn, $tawarin)){
        header('location:homedosen');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:homedosen');
        
    }
}

?>