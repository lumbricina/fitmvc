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
$sidang="SELECT * FROM jadwalsidang WHERE mahasiswa='$nama'";
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
                                    <p>Hubungi dosen terkait untuk mengambil judul</p>
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
                                        <p> <?php echo implode(', ', $judul);?></p></div>
                                    <h6>Dosbing 1</h6>
                                    <div class="text-left sup text-primary">
                                    <p><?php echo$row["pembimbing1"];?></p></div>

                                    <h6>Dosbing 2</h6>
                                    <div class="text-left sup text-primary">
                                    <p><?php echo$row["pembimbing2"];}}?></p></div>
                                </div>

                            </div>

                            
                </div>

                
                <!-- /.container-fluid -->

            </div></div></div>
            <div class="row col-lg">

             <div class="row">
                    <div class="col-xl-12 col-lg-9">
                    <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Jadwal Sidang</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Mahasiswa</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $result = $conn->query($sidang);
                                            if (!empty($result) && $result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo$row["tanggal"];?></td>
                                            <td><?php echo$row["waktu"];?></td>
                                            <td><?php echo$row["mahasiswa"];}}?> </td>
                                        
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Dokumen</h6>
                                </div>
                            <div class="card-body">
                                <a href="dokumen/lembar pengesahan 1 pembimbing.docx" download rel="noopener noreferrer" target="_blank"> Download Lembar Pengesahan (1 pembimbing) </a><br>
                                <a href="dokumen/lembar pengesahan 2 pembimbing.docx" download rel="noopener noreferrer" target="_blank"> Download Lembar Pengesahan (2 pembimbing) </a><br>
                                <a href="dokumen/pembatalan ta.docx" download rel="noopener noreferrer" target="_blank"> Download Formulir Pembatalan Tugas Akhir </a><br>
                                <a href="dokumen/proposal.docx" download rel="noopener noreferrer" target="_blank"> Download Format Proposal</a><br>
                                <a href="dokumen/SOP Tugas Akhir.docx" download rel="noopener noreferrer" target="_blank"> Download SOP</a><br>
                                <a href="dokumen/Prosedur TA.pptx" download rel="noopener noreferrer" target="_blank"> Download Prosedur</a><br>
                                <a href="dokumen/panduan.docx" download rel="noopener noreferrer" target="_blank"> Download Panduan Penggunaan</a><br>
                            </div>
                        </div>

                   </div>
            <!-- End of Main Content -->


            <?php $this->view("fit/footer", $data);?>
            