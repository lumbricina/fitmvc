<?php $data['page_title'] = "LobiDosen";$this->view("fit/headerdosen", $data);?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Log Book Mahasiswa</h1>
                    <p class="mb-4">Diary</p>

                    <!-- Form Lobi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Lobi</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Tanggal</h7>                                 
                                    <input type="date" class="form-control form-control-user"
                                        id="date" aria-describedby="date">
                                </div>
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Waktu</h7>                                 
                                    <input type="time" class="form-control form-control-user"
                                        id="time" aria-describedby="time"> 
                                    </div> </div>                                            
                            <h7 class="text-gray-900 mb-4">Isi</h7>
                                                                
                                    <input type="text" class="form-control form-control-user"
                                    id="text" aria-describedby="text"                                        
                                    placeholder="masukan isi" autocomplete="off">
                            </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" form="lobi" value="Submit">Submit</button>                                                  
                            </div></div>

                    <!-- DataTales Example -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Logging</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Isi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01/01/2022</td>
                                            <td>15:00 WIB</td>
                                            <td>Buat proposal TA</td>
                                            <td>acc/tolak</td>
                                            <td>
                                                <div class="row">
                                                <div class="dropdown no-arrow ml-2">
                                                    <button class="btn btn-warning btn-circle btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                                <a class="btn btn-success btn-circle btn-sm ml-2" href="#"><i class="fas fa-check"></i></a>
                                            </div></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php $this->view("fit/footerdosen", $data);?>