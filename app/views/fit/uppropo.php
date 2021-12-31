<?php

include('koneksi.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['judul']))
{
    $mahasiswa = $_SESSION['user']['nama'];
    $pem1 = $_POST['pem1'];
    $pem2 = $_POST['pem2'];
    $judul = $_POST['judul'];
    $ringkasan = $_POST['ringkasan'];
    $date = gmdate('Y-m-d');
    $timezone  = +7; //WIB
    $time = gmdate('H:i:s', time() + 3600*($timezone+date("I")));

    $temp = $_FILES['file2']['tmp_name'];
    $filename = date(time()).$_FILES['file2']['name'];
    $ukuran = $_FILES['file2']['size'];
    $type = $_FILES['file2']['type'];
    $folder = "uploadPengajuan/";


    if ($ukuran < 2044070){
        move_uploaded_file($temp, $folder . $filename);
    }

    $prop="INSERT INTO proposal (id, date, time, nama, pembimbing1, pembimbing2, judul, ringkasan, status, filename) VALUES (NULL, '$date', '$time', '$mahasiswa','$pem1','$pem2','$judul','$ringkasan','1', '$filename')";

    if(mysqli_query($conn, $prop)){
        $query = "SELECT email FROM user WHERE nama='$mahasiswa' OR role='1' ";
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
                $mail->Body = '<h4>Proposal telah terupload. Cek web untuk lebih detil</h4>';
                $to=$email;#. ',';

                $mail->addAddress("$email");

                if ( $mail->send() ) {
                    header('location:pengajuan');
                    #echo "uda";
                }else{
                    echo "Something is wrong. " . $mail->ErrorInfo;
                    header('Refresh : 3, location:pengajuan');

                }

                $mail->smtpClose();
    
    }
}
}
?>