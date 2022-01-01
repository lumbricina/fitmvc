<?php
    if(!isset($_SESSION['user'])){
        header('location:login');
        session_destroy();
    }elseif ($_SESSION['user']['role']!='2') {
        session_destroy();
    }elseif ($_SESSION['user']['role']=='1') {
        session_destroy();
    }elseif ($_SESSION['user']['role']=='3') {
        session_destroy();
    }else {
    
    }
    $data['page_title'] = "setujuilobi";$this->view("fit/headerdosen", $data);
    include('koneksi.php');

    $nama=$_GET['nama'];
    $date=$_GET['date'];
    $time=$_GET['time'];
    $isi=$_GET['isi'];

    if(count($_POST)>0) {
        mysqli_query($conn,"UPDATE lobi set status='3' WHERE (nama='" . $_GET['nama'] . "' AND date='" . $_GET['date'] . "' AND time='" . $_GET['time'] . "')");
    }
    $result = mysqli_query($conn,"SELECT * FROM lobi WHERE (nama='" . $_GET['nama'] . "' AND date='" . $_GET['date'] . "' AND time='" . $_GET['time'] . "')");
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
        <div class="col-xl-6 col-lg-7">
                <button class="btn btn-secondary" onclick="history.back()">Go Back</button>
            </div>
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
                                    <input type="text" readonly class="form-control form-control-user" name="nama"  value="<?php echo $row['nama']; ?>">
                                        <br>
                                <h7 class="text-gray-900 mb-4">Date</h7>
                                    <input type="text" readonly class="form-control form-control-user" name="date" class="txtField" value="<?php echo $row['date']; ?>">
                                        <br>
                                <h7 class="text-gray-900 mb-4">Time</h7>
                                    <input type="text" readonly class="form-control form-control-user" name="time" class="txtField" value="<?php echo $row['time']; ?>">
                                        <br>
                                <h7 class="text-gray-900 mb-4">Isi</h7>
                                    <input type="text" readonly class="form-control form-control-user" name="isi" class="txtField" value="<?php echo $row['isi']; ?>">
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