<?php $data['page_title'] = "Proposal";$this->view("fit/headeradmin", $data);?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Persetujuan Proposal</h1>

                    
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
                                            <th>Tanggal</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Judul</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Ringkasan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01/01/2022</td>
                                            <td>Mint Chocolate</td>
                                            <td>Pengembangan cokelat berbasis mint</td>
                                            <td>KG</td>
                                            <td>HG</td>
                                            <td>ini ringkasan</td>
                                            <td>acc/tolak</td>
                                            <td>
                                                <div class="row">
                                                <div class="dropdown no-arrow ml-2">
                                                    <button class="btn btn-warning btn-circle btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="modal" aria-haspopup="true" data-target="#poprevisi"
                                                    aria-expanded="false" title="Revisi">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    </button>
                                                    <div class="modal fade" id="poprevisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Revisi</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">Masukkan feedback / revisi</div>
                                                                <div class="form-group px-3 pb-3">
                                                                <input type="text" class="form-control form-control-user" id="text" aria-describedby="text" placeholder="masukan isi revisi" autocomplete="off">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    <a class="btn btn-primary" href="#">Submit</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn btn-success btn-circle btn-sm ml-2" href="#" title="Setujui"><i class="fas fa-check"></i></a>
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

            <?php $this->view("fit/footeradmin", $data);?>