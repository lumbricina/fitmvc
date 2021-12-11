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
<?php $data['page_title'] = "HomeAdmin"; $this->view("fit/headeradmin",$data);?>

        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>                      
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tawaran Tugas Akhir</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="text">
                                        <dd class="text-left">Tawaran Judul</dd>
                                        <div class="text-left small text-primary">
                                        <p>Nama Dosen</p>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    

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
                                        <tr>
                                            <td>Lala</td>
                                            <td>Nina</td>
                                            <td>Aplikasi something</td>
                                        
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="jadwalsidang">Tambah</a>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <?php $this->view("fit/footer", $data);?>
            