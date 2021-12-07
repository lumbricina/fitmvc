<?php $data['page_title'] = "Pengajuan";$this->view("fit/header", $data);?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pengajuan Tugas Akhir</h1>

                    <!-- Form Pengajuan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-6">
                            <h7 class="text-gray-900 mb-4">Pembimbing 1</h7>                                 
                                    <input type="text" class="form-control form-control-user mb-2"
                                        id="dosen" aria-describedby="text">
                                </div>
                                <div class="col-lg-6">
                                <h7 class="text-gray-900 mb-4">Pembimbing 2</h7>                                 
                                    <input type="text" class="form-control form-control-user mb-2"
                                        id="dosen" aria-describedby="text">
                                    </div> 
                                </div>                                            
                            <h7 class="text-gray-900 mb-4">Judul Tugas Akhir</h7>
                                    <input type="text" class="form-control form-control-user mb-2"
                                    id="text" aria-describedby="text"                                        
                                    placeholder="masukan judul" autocomplete="off">
                            <h7 class="text-gray-900 mb-4">Ringkasan</h7>
                                    <input type="text" class="form-control form-control-user mb-2"
                                    id="text" aria-describedby="text"                                        
                                    placeholder="masukan ringkasan" autocomplete="off">
                            </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" form="lobi" value="Submit">Submit</button>                                                  
                            </div></div>

                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Logging</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Feedback / Revisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Lala</td>
                                            <td>Nina</td>
                                            <td>Aplikasi something</td>
                                            <td>acc/tolak</td>
                                            <td>pidback</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                           

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php $this->view("fit/footer", $data);?>