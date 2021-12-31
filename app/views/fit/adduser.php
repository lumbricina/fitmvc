<?php

include('koneksi.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submit'])) {

    $uname = $_POST['uname'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $adduser = "INSERT INTO user (id, username, password, nama, role, email) VALUES (NULL, '$uname', '$uname', '$nama', '$role', '$email')";

    if(mysqli_query($conn,$adduser)){
        $query = "SELECT email FROM user WHERE nama='$nama' OR role='1'";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            $email=$row['email'];

        

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';
        $mail->isHTML(true);
        $mail->Username = 'fit.it.its@gmail.com';
        $mail->Password = 'Mejakursi1';
        $mail->setFrom('fit.it.its@gmail.com');
        $mail->Subject = 'FIT Notification';
        $mail->Body = '<h4>User telah ditambahkan. Username dan password sama. Cek web untuk lebih detil. Hubungi admin jika ada kendala</h4>';
        $to=$email;#. ',';

        $mail->addAddress("$email");

        if ( $mail->send() ) {
            header('location:penilaian', true, 302);
            #echo "uda";
        }else{
            echo "Something is wrong. " . $mail->ErrorInfo;
            header('Refresh : 3, location:penilaian');

        }

        $mail->smtpClose();

        }
        header('location:tambahuser');
    }else{
        echo "error: " . mysqli_error($conn);
        header('Refresh : 3, location:tambahuser');
    }


    
}



?>