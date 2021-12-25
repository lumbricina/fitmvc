<?php 
if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}elseif ($_SESSION['user']['role']!='2') {
    session_destroy();
}elseif ($_SESSION['user']['role']=='3') {
    session_destroy();
}elseif ($_SESSION['user']['role']=='1') {
    session_destroy();
}else {

}
    
    $data['page_title'] = "LobiDosen";$this->view("fit/headerdosen", $data); include("koneksi.php");
    $query = "SELECT pembimbing.mahasiswa, lobi.date, lobi.time, lobi.isi, lobi.status FROM pembimbing RIGHT JOIN lobi WHERE pembimbing.mahasiswa=lobi.nama";
    ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Log Book Mahasiswa</h1>
                    <p class="mb-4">Pembimbing 1 harap melakukan persetujuan (acc) lobi mahasiswa </p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Logging</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x:auto;">
                            <?php $result = $conn->query($query);?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Isi</th>
                                            <th>Status</th>
                                            <th>Revisi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php while($row = $result->mysql_fetch_array()) { ?>
                                        <tr>
                                            <td><?php echo$row["mahasiswa"];?></td>  
                                            <td><?php echo$row["date"];?></td>
                                            <td><?php echo$row["time"];?></td>
                                            <td><?php echo$row["isi"];?></td>
                                            <td><?php echo$row["status"];?></td>
                                            <td><?php echo$row["revisi"];?></td>
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
                                </table><?php };?>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php $this->view("fit/footer", $data);?>