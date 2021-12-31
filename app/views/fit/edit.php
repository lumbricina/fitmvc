<?php
    if(!isset($_SESSION['user'])){
        header('location:login');
        session_destroy();
    }elseif ($_SESSION['user']['role']=='1') {
        session_destroy();
    }elseif ($_SESSION['user']['role']!='3') {
        session_destroy();
    }elseif ($_SESSION['user']['role']=='2') {
        session_destroy();
    }else {
    
    }
    $data['page_title'] = "edit_lobi";
    $this->view("fit/header", $data);
    include('koneksi.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $nama=$_SESSION['user']['nama'];

    $id_lobi=$_GET['id_lobi'];
    $date=$_GET['date'];
    $time=$_GET['time'];
    $isi=$_GET['isi'];

    if(isset($_POST['id_lobi'])){
    $update="UPDATE lobi WHERE (id_lobi='" . $_GET['id_lobi'] . "' AND date='" . $_GET['date'] . "' AND time='" . $_GET['time'] . "'AND isi='" . $_GET['isi'] . "')";
    if(mysqli_query($conn, $update)){

        $pem1 = "SELECT pembimbing1 FROM pembimbing WHERE mahasiswa='$nama'";
        $query = "SELECT user.email FROM user INNER JOIN pembimbing WHERE user.nama='$nama' OR user.nama='$pem1'";
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
        $mail->Body = '<h4>Lobi telah diedit. Cek web untuk lebih detil</h4>';
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



        header('location:lobi');}
    }}
    $result = mysqli_query($conn,"SELECT * FROM lobi WHERE (id_lobi='" . $_GET['id_lobi'] . "' AND date='" . $_GET['date'] . "' AND time='" . $_GET['time'] . "'AND isi='" . $_GET['isi'] . "')");
    $row= mysqli_fetch_array($result);

?>
<html>

    <body>
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Lobi</h1>                      
    </div>

    <!-- Content Row -->
    <div class="row">

    <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Log Book </h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                            <p> Untuk batal tekan tombol back (kembali ke halaman sebelumnya) </p>
                                <form method="POST" action="delete">
                                    <h7 class="text-gray-900 mb-4">Id Lobi</h7>
                                    <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="id_lobi" id="id_lobi" value="<?php echo $row['id_lobi']; ?>"></div>
                                    <h7 class="text-gray-900 mb-4">Tanggal</h7>
                                    <div class="px-3 pb-3"><input class="form-control form-control-user" type="date" name="date" id="date" value="<?php echo $row['date']; ?>"></div>
                                    <h7 class="text-gray-900 mb-4">Waktu</h7>
                                    <div class="px-3 pb-3"><input class="form-control form-control-user" type="time" name="time" id="time" value="<?php echo $row['time']; ?>"></div>
                                    <h7 class="text-gray-900 mb-4">Isi</h7>
                                    <div class="px-3 pb-3"><input class="form-control form-control-user" name="isi" id="isi" value="<?php echo $row['isi']; ?>"></div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="edit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>      
    </body>
</html>
<?php  $this->view("fit/footer", $data);?>