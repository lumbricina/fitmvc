<?php

include('koneksi.php');

    if(isset($_POST['isi']))
        {
            $mahasiswa = $_SESSION['user']['nama'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $isi = $_POST['isi'];
            $updatelobi="UPDATE lobi (id_lobi, nama, date, time, isi) VALUES (NULL, '$mahasiswa', '$date', '$time', '$isi')";
            #header('location:lobi');

            if(mysqli_query($conn, $inlobi)){
                header('location:lobi');
            }else{
                echo "error: " .mysqli_error($conn);
                header('Refresh : 3, location:lobi');
            }
        }

?>