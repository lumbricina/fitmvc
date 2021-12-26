<?php
    if(!isset($_SESSION['user'])){
        header('location:login');
        session_destroy();
    }elseif ($_SESSION['user']['role']!='1') {
        session_destroy();
    }elseif ($_SESSION['user']['role']=='3') {
        session_destroy();
    }elseif ($_SESSION['user']['role']=='2') {
        session_destroy();
    }else {
    
    }
    $data['page_title'] = "setujui";$this->view("fit/headeradmin", $data);
    include('koneksi.php');
    $nama=$_SESSION['user']['nama'];

    $name=$_GET['nama'];
    $pem1=$_GET['pembimbing1'];
    $pem2=$_GET['pembimbing2'];
    $judul=$_GET['judul'];

    if(count($_POST)>0) {
        mysqli_query($conn,"UPDATE proposal set status='3' WHERE (nama='" . $_GET['nama'] . "' AND pembimbing1='" . $_GET['pembimbing1'] . "' AND pembimbing2='" . $_GET['pembimbing2'] . "' AND judul='" . $_GET['judul'] . "')");
        mysqli_query($conn,"INSERT INTO pembimbing(id, mahasiswa, pembimbing1, pembimbing2) VALUES (NULL, '$name', '$pem1', '$pem2')");
    }
    $result = mysqli_query($conn,"SELECT * FROM proposal WHERE (nama='" . $_GET['nama'] . "' AND pembimbing1='" . $_GET['pembimbing1'] . "' AND pembimbing2='" . $_GET['pembimbing2'] . "' AND judul='" . $_GET['judul'] . "')");
    $row= mysqli_fetch_array($result);

?>
<html>

    <body>
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Persetujuan Proposal</h1>                      
    </div>

    <!-- Content Row -->
    <div class="row">

    <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Yakin untuk mensetujui proposal ini? </h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                            <p> Untuk batal tekan tombol back (kembali ke halaman sebelumnya) </p>
                                <form method="POST" action="">
                                <h7 class="text-gray-900 mb-4">Mahasiswa</h7>
                                    <input type="text" readonly class="form-control form-control-user" name="userid"  value="<?php echo $row['nama']; ?>">
                                        <br>
                                <h7 class="text-gray-900 mb-4">Pembimbing1</h7>
                                    <input type="text" readonly class="form-control form-control-user" name="pembimbing1" class="txtField" value="<?php echo $row['pembimbing1']; ?>">
                                        <br>
                                <h7 class="text-gray-900 mb-4">Pembimbing2</h7>
                                    <input type="text" readonly class="form-control form-control-user" name="pembimbing2" class="txtField" value="<?php echo $row['pembimbing2']; ?>">
                                        <br>
                                <h7 class="text-gray-900 mb-4">Judul</h7>
                                    <input type="text" readonly class="form-control form-control-user" name="judul" class="txtField" value="<?php echo $row['judul']; ?>">
                                        <br>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Setujui" class="buttom">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
            

    </body>
</html>