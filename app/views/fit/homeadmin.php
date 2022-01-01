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
    
?>
<?php $data['page_title'] = "HomeAdmin"; $this->view("fit/headeradmin",$data);include("koneksi.php");
$tawar="SELECT * FROM tawarandosen";
$sidang="SELECT * FROM jadwalsidang";?>

        

 
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>                      
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tawaran Tugas Akhir</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="text">
                                        <dd class="text-left">Input Tawaran Judul</dd>
                                        <div class="form-group">
                                            <div class="row-cols-1">
                                                <form name="tawaran" action="tawarkan" method="POST">
                                                <div class="col-12">
                                                    <h7 class="text-gray-900 mb-4">Judul</h7>                                 
                                                        <input type="text" name="tawaranjdl" id="tawaranjdl" class="form-control form-control-user" id="text" aria-describedby="text" autocomplete="false">
                                                </div>
                                                <div class="col-lg-2 pt-2">
                                                    <h7 class="text-gray-900 mb-4"></h7>                                 
                                                    <input type="submit" class="btn btn-primary" value="Submit"></input>
                                                </div>
                                                                                          
                                            </div>
                                        </div>
                                <div class="text">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $conn->query($tawar);
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
                    </div></div>                   

                        <!-- Profile -->
                        
                        <div class="col-xl-6 col-lg-7">
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
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="jadwalsidang">Tambah</a>
                            </div>
                        </div>
                            </div>

                            <div class="row col-lg">
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
                                <a href="dokumen/panduan.pptx" download rel="noopener noreferrer" target="_blank"> Download Panduan Penggunaan</a><br>
                            </div>
                        </div>
                        </div>

                        
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <?php $this->view("fit/footer", $data);?>
            