<?php 
if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}elseif ($_SESSION['user']['role']!='3') {
    session_destroy();
}elseif ($_SESSION['user']['role']=='1') {
    session_destroy();
}elseif ($_SESSION['user']['role']=='2') {
    session_destroy();
}else {

}
$data['page_title'] = "Lobi";
$this->view("fit/header", $data);
include('koneksi.php');
$nama=$_SESSION['user']['nama'];
$query = "SELECT*FROM lobi WHERE nama='$nama'";
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Log Book</h1>
                    <p class="mb-4">Diary</p>

                    <!-- Form Lobi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Lobi</h6>
                        </div>
                        <div class="card-body">
                        <form name="lobi" action="inlobi" method="POST">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Tanggal</h7>                                 
                                    <input type="date" class="form-control form-control-user"
                                        id="date" name="date">
                                </div>
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Waktu</h7>                                 
                                    <input type="time" class="form-control form-control-user"
                                        id="time" name="time"> 
                                    </div> </div>                                            
                            <h7 class="text-gray-900 mb-4">Isi</h7>
                                                                
                                    <input type="text" class="form-control form-control-user"
                                    id="text" name="isi"                                        
                                    placeholder="masukan isi" autocomplete="off">
                            </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit"></input>                                                  
                            </div></form></div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Logging</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                           <?php $result = $conn->query($query);
                                if ($result->num_rows > 0) { ?>
                                <table class="table table-bordered" style="overflow-x:auto;" id="dataTable" width="100%" cellspacing="0">
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
                                   <?php while($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo$row["date"];?></td>
                                            <td><?php echo$row["time"];?></td>
                                            <td><?php echo$row["isi"];?></td>
                                            <td><?php echo$row["status"];?></td>
                                            <td>
                                                <div class="row">
                                                <div class="dropdown no-arrow ml-2">
                                                    <button class="btn btn-warning btn-circle btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" title="Dropdown">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" aria-haspopup="true" data-target="#popedit" aria-expanded="false" title="Edit" onclick="popUpEdit('<?= $row['id_lobi']; ?>','<?= $row['date']; ?>', '<?= $row['time']; ?>', '<?= $row['isi']; ?>')">Edit</a>
                                                        <a class="dropdown-item" href="#" title="Delete">Delete</a>
                                                    </div>
                                                </div>
                                                <a class="btn btn-success btn-circle btn-sm ml-2" href="#" title="Send"><i class="fas fa-check"></i></a>
                                            </div></div>
                                            </td><?php }; ?>
                                        </tr>
                                    </tbody>
                                </table><?php };?>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <div class="modal fade" id="popedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Edit Data Lobi</div>
                        <div class="form-group px-3 pb-3">
                            <form name="edit" id="edit" action="edit" method="POST">
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="id_lobi" id="id_lobi"></div>
                            <div class="px-3 pb-3"><input class="form-control form-control-user" name="date" id="date"></div>
                            <div class="px-3 pb-3"><input class="form-control form-control-user" name="time" id="time"></div>
                            <div class="px-3 pb-3"><input class="form-control form-control-user" name="isi" id="isi"></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-primary" type="submit" value="Submit"></input>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function popUpEdit(id_lobi, date, time, isi) {
                    document.querySelector('#popedit input[name="id_lobi"]').value = id_lobi;
                    document.querySelector('#popedit input[name="date"]').value = date;
                    document.querySelector('#popedit input[name="time"]').value = time;
                    document.querySelector('#popedit input[name="isi"]').value = isi;
                }
            </script>

            <?php  $this->view("fit/footer", $data);?>