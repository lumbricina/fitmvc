<?php 
    if(!isset($_SESSION['user'])){
        header('location:login');
        session_destroy();
    }elseif ($_SESSION['user']['role']!="3") {
        session_destroy();
    }elseif ($_SESSION['user']['role']=="1") {
        session_destroy();
    }elseif ($_SESSION['user']['role']=="2") {
        session_destroy();
    }else {

    }
    
?>

<?php $data['page_title'] = "Home"; $this->view("fit/header",$data); include("koneksi.php");
$query="SELECT * FROM tawarandosen";
$nama=$_SESSION['user']['nama'];
$nrp=mysqli_fetch_assoc(mysqli_query($conn,"SELECT username FROM user WHERE nama='$nama'"));
$pem="SELECT * FROM pembimbing WHERE mahasiswa='$nama'";
$judul=mysqli_fetch_assoc(mysqli_query($conn,"SELECT judul FROM proposal WHERE nama='$nama'"));
?>


        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>                      
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tawaran Tugas Akhir</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <p>Hubungi dosen terkait untuk mengambil judul :v</p>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo$row["penawaran"];?></td>
                                            <td><?php echo$row["dosen"];}}?></td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>                        
                    

                        <!-- Profile -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h6>Nama</h6>
                                    <div class="text-left sup text-primary">
                                        <p><?php echo $nama;?></p></div>
                                    <h6>NRP</h6>
                                    <div class="text-left sup text-primary">
                                        <p><?php echo implode(', ', $nrp);?></p></div>
                                        <?php
                                            $result = $conn->query($pem);
                                            if (!empty($result) && $result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                    <h6>Judul</h6>
                                    <div class="text-left sup text-primary">
                                        <p> <?php echo $judul;?></p></div>
                                    <h6>Dosbing 1</h6>
                                    <div class="text-left sup text-primary">
                                    <p><?php echo$row["pembimbing1"];?></p></div>

                                    <h6>Dosbing 2</h6>
                                    <div class="text-left sup text-primary">
                                    <p><?php echo$row["pembimbing2"];}}?></p></div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <?php $this->view("fit/footer", $data);?>
            