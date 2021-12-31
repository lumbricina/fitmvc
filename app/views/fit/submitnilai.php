<?php

include('koneksi.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
        $query = "SELECT email FROM user WHERE nama='$mhs' OR role='1' OR username='$uname'";
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
        $mail->Body = '<h4>Nilai telah masuk. Cek web untuk lebih detil</h4>';
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