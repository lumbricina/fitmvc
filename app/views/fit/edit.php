<?php

include('koneksi.php');
            $nama=$_SESSION['user']['nama'];
            $id = $_POST['id_lobi'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $isi = $_POST['isi'];
            $updatelobi="UPDATE lobi SET (date, time, isi) VALUES ('$date', '$time', '$isi') WHERE id='$id'";
            #header('location:lobi');

            if(mysqli_query($conn, $updatelobi)){
                header('location:lobi');
            }else{
                echo "error: " .mysqli_error($conn);
                header('Refresh : 3, location:lobi');
            }
        }

?>