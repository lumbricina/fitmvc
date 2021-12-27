<?php

include('koneksi.php');

if(isset($_POST['submit'])) {

    $uname = $_POST['uname'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $adduser = "INSERT INTO user (id, username, password, nama, role, email) VALUES (NULL, '$uname', '$uname', '$nama', '$role', '$email')";

    if(mysqli_query($conn,$adduser)){
        header('location:tambahuser');
    }else{
        echo "error: " . mysqli_error($conn);
        header('Refresh : 3, location:tambahuser');
    }


    
}



?>