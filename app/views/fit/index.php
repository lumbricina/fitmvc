<?php 
    if(!isset($_SESSION['user'])){
        header('location:login');
        session_destroy();
    }else{

    }

        
?>

<?php $data['page_title'] = "Home"; $this->view("fit/header",$data);?>

        

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
                        <div class="col-xl-4 col-lg-5">
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
                                        <p>Nama Mahasiswa</p></div>
                                    <h6>NRP</h6>
                                    <div class="text-left sup text-primary">
                                        <p>NRP Mahasiswa</p></div>
                                    <h6>Dosbing 1</h6>
                                    <div class="text-left sup text-primary">
                                        <p>Nama Dosbing 1</p></div>
                                    <h6>Dosbing 2</h6>
                                    <div class="text-left sup text-primary">
                                        <p>Nama Dosbing 2</p></div>
                                    <h6>Judul</h6>
                                    <div class="text-left sup text-primary">
                                        <p>Judul Tugas Akhir</p></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <?php $this->view("fit/footer", $data);?>
            