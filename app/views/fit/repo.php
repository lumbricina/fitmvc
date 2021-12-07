<?php $data['page_title'] = "Repo"; $this->view("fit/header",$data);?>

                  <!-- Begin Page Content -->
                  <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-2 text-gray-800">Repository</h1>
                  <p class="mb-4">Data yang dah ambil TA.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Judul</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Ali</td>
                                            <td>Nana</td>
                                            <td>Lulus</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                          <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->




<?php $data['page_title'] = "Repo"; $this->view("fit/footer",$data);?>