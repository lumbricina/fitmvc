<?php

include('koneksi.php');
#include('sendEmail.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    if(isset($_POST['isi']))
        {
            $mahasiswa = $_SESSION['user']['nama'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $isi = $_POST['isi'];

            #$rand = rand();
            $temp = $_FILES['file1']['tmp_name'];
            #$ekstensi =  array('png','jpg','jpeg','pdf','doc','docx');
            $filename = date(time()).$_FILES['file1']['name'];
            $ukuran = $_FILES['file1']['size'];
            $type = $_FILES['file1']['type'];
            $folder = "uploadLobi/";
            #$ext = pathinfo($filename, PATHINFO_EXTENSION);

            if ($ukuran < 1044070){
                move_uploaded_file($temp, $folder . $filename);
            }
             
            #if(!in_array($ext,$ekstensi) ) {
            #    echo "error: " .mysqli_error($conn);
            #    header('Refresh : 3, location:lobi');
            #}else{
            #    if($ukuran < 1044070){		
            #        move_uploaded_file($_FILES['file1']['tmp_name'], 'uploads/'.$filename);
            
            $inlobi="INSERT INTO lobi (id_lobi, nama, date, time, isi, status, filename) VALUES (NULL, '$mahasiswa', '$date', '$time', '$isi', '1', '$filename')";
            #header('location:lobi');

            
            

            if(mysqli_query($conn, $inlobi)){
                

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
                $mail->Subject = 'yo';
                $mail->Body = 'tes yo kl masok chat yo';
                $to='nugas.time@gmail.com'. ',';
                $to.='mileniaulwanzafira@gmail.com';
                #$mail->SetFrom("$from", "$from");
                $mail->addAddress("nugas.time@gmail.com");
                $mail->addAddress("mileniaulwanzafira@gmail.com");

                #$mail->Subject = "$subject";
                #$mail->Body = "$message";
                #$mail->Send();
                if ( $mail->send() ) {
                    echo "Email Sent..!";
                }else{
                    echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
                }

                $mail->smtpClose();

                #header('location:lobi');


           
        }

    }?>