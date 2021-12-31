<?php

include('koneksi.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['pem2']))
{
    $isirevisi = $_POST['isirevisi'];
    ##$query = "SELECT * FROM proposal";
    $pem1 = $_POST['pem1'];
    $nama = $_POST['mhs'];
    $pem2= $_POST['pem2'];


    $props="UPDATE proposal SET revisi='$isirevisi', pembimbing2='$pem2', status='2' WHERE nama='$nama' && pembimbing1='$pem1'";

    if(mysqli_query($conn, $props)){


        $query = "SELECT email FROM user WHERE nama='$nama' OR role='1' OR nama='$pem1' OR nama='$pem2'";
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
        $mail->Body = '<h4>Ada revisi pada proposal. Cek web untuk lebih detil</h4>';
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
}
}
?>
        #echo "uda";
        header('location:proposal');
    }else{
        echo "eror: " . mysqli_error($conn);
        header('Refresh : 3, location:proposal');
    }
}

?>