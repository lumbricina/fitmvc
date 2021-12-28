<?php

include('koneksi.php');

if(isset($_POST['submit'])) {

    $mhs = $_POST['mhs'];
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $n4 = $_POST['n4'];
    $revisi = $_POST['rev'];
    $role = $_POST['role'];
    $uname=$_SESSION['user']['username'];

    $submit = "INSERT INTO hasilsidang (id, mahasiswa, username, role, nilai1, nilai2, nilai3, nilai4, revisi) VALUES (NULL, '$mhs', '$uname', '$role', '$n1', '$n2', '$n3', '$n4', $revisi)";

    if(mysqli_query($conn,$submit)){
        header('location:penilaian');
    }else{
        echo "error: " . mysqli_error($conn);
        header('Refresh : 3, location:penilaian');
    }


    
}



?>