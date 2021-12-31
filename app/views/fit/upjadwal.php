<?php

include('koneksi.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['pen1']))
{
    $mahasiswa = $_POST['mahasiswa'];
    $pen1 = $_POST['pen1'];
    $pen2 = $_POST['pen2'];
    $pen3 = $_POST['pen3'];
    $date = $_POST['date']; //gmdate('Y-m-d');
    $timezone  = +7; //WIB
    $time = $_POST['time']; //gmdate('H:i:s', $_POST['time'] + 3600*($timezone+date("I")));

    $jadwal="INSERT INTO jadwalsidang (id, tanggal, waktu, mahasiswa, penilai1, penilai2, penilai3) VALUES (NULL, '$date', '$time', '$mahasiswa', '$pen1', '$pen2', '$pen3') ";

    if(mysqli_query($conn, $jadwal)){
        $query = "SELECT email FROM user WHERE nama='$mahasiswa' OR role='1' OR nama='$pen1' OR nama='$pen2' OR nama='$pen3' ";
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
                $mail->Body = '<h4>Ada jadwal baru. Cek web untuk lebih detil</h4>';
                $to=$email;#. ',';

                $mail->addAddress("$email");

                if ( $mail->send() ) {
                    header('location:jadwalsidang');
                    #echo "uda";
                }else{
                    echo "Something is wrong. " . $mail->ErrorInfo;
                    header('Refresh : 3, location:jadwalsidang');

                }

                $mail->smtpClose();
    
    }
}
}
?>