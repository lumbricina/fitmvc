<?php

include('koneksi.php');
$uname=$_SESSION['user']['username'];

if(isset($_POST['n1'])) {

    $mhs = $_POST['mahasiswa'];
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $n4 = $_POST['n4'];
    $revisi = $_POST['rev'];
    $role = $_POST['role'];
    $peran = $_POST['peran'];
    #$uname=$_SESSION['user']['username'];

    $sidang = "INSERT INTO hasilsidang (id, mahasiswa, username, role, peran, nilai1, nilai2, nilai3, nilai4, revisi) VALUES (NULL, '$mhs', '$uname', '$role', '$peran', '$n1', '$n2', '$n3', '$n4', '$revisi')";

    if(mysqli_query($conn,$sidang)){
        header('location:penilaian', true, 302);
    }else{
        echo "Error: " . $sidang . "<br>" . mysqli_error($conn);
        header('Refresh : 3, location:penilaian');
    }


    
}



?>