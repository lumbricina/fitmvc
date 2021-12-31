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


            $temp = $_FILES['file1']['tmp_name'];
            $filename = date(time()).$_FILES['file1']['name'];
            $ukuran = $_FILES['file1']['size'];
            $type = $_FILES['file1']['type'];
            $folder = "uploadLobi/";

            if ($ukuran < 1044070){
                move_uploaded_file($temp, $folder . $filename);
            }
             
            $inlobi="INSERT INTO lobi (id_lobi, nama, date, time, isi, status, filename) VALUES (NULL, '$mahasiswa', '$date', '$time', '$isi', '1', '$filename')";
            #header('location:lobi');

            
            

            if(mysqli_query($conn, $inlobi)){
                
                $query = "SELECT user.email FROM user INNER JOIN pembimbing WHERE user.nama='$mahasiswa' OR user.nama=pembimbing.pembimbing1 OR user.nama=pembimbing.pembimbing2 ";
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
                $mail->Body = '<h4>Terdapat aktivitas mahasiswa, tercatat di lobi, yang perlu dilihat</h4>';
                $to=$email;#. ',';

                $mail->addAddress("$email");

                if ( $mail->send() ) {
                    header('location:lobi');
                    #echo "uda";
                }else{
                    echo "Something is wrong. " . $mail->ErrorInfo;
                    

                }

                $mail->smtpClose();

                #header('location:lobi');

            }
           
        }

    }?>