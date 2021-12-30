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
            #$emailmhs = mysqli_fetch_array(mysqli_query($conn, "SELECT email FROM user WHERE nama='$mahasiswa'"));
            #$emailpem1 = mysqli_fetch_array(mysqli_query($conn, "SELECT user.email FROM user INNER JOIN pembimbing ON pembimbing.pembimbing1=user.nama WHERE '$mahasiswa'=pembimbing.mahasiswa"));
            #$emailpem2 = mysqli_fetch_array(mysqli_query($conn, "SELECT user.email FROM user INNER JOIN pembimbing ON pembimbing.pembimbing2=user.nama WHERE '$mahasiswa'=pembimbing.mahasiswa"));

            
            $mhsemail = $_POST['emailmhs'];
            

            $pem1email = $_POST['emailpem1'];
            

            $pem2email = $_POST['emailpem2'];
            
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
                $mail->Body = '<h1>Ini tes cb ss kirim mo liat kek apa y</h1> <br> <p>' . $mahasiswa . 'menambah lobi dengan keterangan pada' . $date . 'waktu' . $time . 'telah melakukan kegiatan' . $isi . '. <br> Silahkan cek website FIT untuk melihat lebih detil </p>' ;
               
                #$mail->SetFrom("$from", "$from");
                #INI EMAIL KAGA BISA INI SAMPE # BERIKUTNYA
                $penerima = array($mhsemail, $pem1email, $pem2email);

                foreach($penerima as $penerima){
                    $mail->addCC($penerima);
                };
                $mail->addAddress($penerima);
                $mail->addAddress($pem1email);
                $mail->addAddress($pem2email);

                #$mail->Subject = "$subject";
                #$mail->Body = "$message";
                #$mail->Send();
                if ( $mail->send() ) {
                    #header('location:lobi');
                    echo "uda";
                }else{
                    echo "Something is wrong. " . $mail->ErrorInfo;
                    echo $penerima;

                }

                $mail->smtpClose();

                #header('location:lobi');


           
        }

    }?>