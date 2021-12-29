<?php

include('koneksi.php');

    if(isset($_POST['isi']))
        {
            $mahasiswa = $_SESSION['user']['nama'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $isi = $_POST['isi'];

            $rand = rand();
            $ekstensi =  array('png','jpg','jpeg','pdf','doc','docx');
            $filename = $_FILES['file1']['name'];
            $ukuran = $_FILES['file1']['size'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
             
            if(!in_array($ext,$ekstensi) ) {
                echo "error: " .mysqli_error($conn);
                header('Refresh : 3, location:lobi');
            }else{
                if($ukuran < 1044070){		
                    move_uploaded_file($_FILES['file1']['tmp_name'], 'uploads/'.$filename);
            
            $inlobi="INSERT INTO lobi (id_lobi, nama, date, time, isi, status, filename) VALUES (NULL, '$mahasiswa', '$date', '$time', '$isi', '1', '$filename')";
            #header('location:lobi');

            if(mysqli_query($conn, $inlobi)){
                header('location:lobi');
            }else{
                echo "error: " .mysqli_error($conn);
                header('Refresh : 3, location:lobi');
            }
        }}}

?>