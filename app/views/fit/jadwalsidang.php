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
$data['page_title'] = "JadwalSidang";$this->view("fit/headeradmin", $data);
include("koneksi.php");
#$nama=mysqli_fetch_assoc(mysqli_query("SELECT * FROM pembimbing"));
$query= "SELECT jadwalsidang.*, pembimbing.pembimbing1, pembimbing.pembimbing2, proposal.judul FROM jadwalsidang INNER JOIN pembimbing ON jadwalsidang.mahasiswa=pembimbing.mahasiswa INNER JOIN proposal ON pembimbing.mahasiswa=proposal.nama AND pembimbing.pembimbing1=proposal.pembimbing1 AND pembimbing.pembimbing2=proposal.pembimbing2";
$result = mysqli_query($conn, $query);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Jadwal Sidang</h1>

                    <!-- Form Tambah jadwal sidang -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Jadwal Sidang</h6>
                        </div>
                        <div class="card-body">
                            <form name="jadwalsidang" action="upjadwal" method="POST">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Tanggal</h7>                                 
                                    <input type="date" class="form-control form-control-user"
                                        name="date" id="date" aria-describedby="date">
                                </div>
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Waktu</h7>                                 
                                    <input type="time" name="time" class="form-control form-control-user"
                                        id="time" aria-describedby="time"> 
                                    </div> </div>                                            
                            <h7 class="text-gray-900 mb-4">Nama Mahasiswa</h7>
                                                        
                            <?php 
                                    $res = mysqli_query($conn, "SELECT * FROM pembimbing;");
                                    
                                    echo "<select name='mahasiswa' id='mahasiswa' class='form-control form-control-user mb-2'>";
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<option value='".$row['mahasiswa'] . "'>" . $row['mahasiswa'] . "</option>";
                                    }
                                    echo "</select>"?>
                            </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit"></input>                                                  
                            </div></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Jadwal Sidang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Judul</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                           while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo$row["tanggal"];?></td>
                                            <td><?php echo$row["waktu"];?></td>
                                            <td><?php echo$row["mahasiswa"];?></td>
                                            <td><?php echo$row["judul"];?></td>
                                            <td><?php echo$row["pembimbing1"];?></td>
                                            <td><?php echo$row["pembimbing2"];?></td>
                                            <td>
                                                <div class="row">
                                                    <button class="btn btn-danger btn-circle btn-sm ml-2" type="button"
                                                    data-toggle="modal" aria-haspopup="true" data-target="#popdel" aria-expanded="false" title="Delete" onclick="popUp('<?= $row['id']; ?>','<?= $row['tanggal']; ?>', '<?= $row['waktu']; ?>', '<?= $row['mahasiswa']; ?>')">
                                                    <i class="fas fa-trash"></i>
                                                    </button>
                                            </div></div>
                                            </td> <?php } ; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
           
            <!-- Modal Edit -->
            <div class="modal fade" id="popdel" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="label">Edit</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Delete Data Sidang</div>
                        <div class="form-group px-3 pb-3">
                            <form name="delete" id="delete" action="delete" method="POST">
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="id" id="id"></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" type="date" name="tanggal" id="tanggal"></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" type="time" name="waktu" id="waktu"></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="mahasiswa" id="mahasiswa"></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-primary" type="submit" value="Delete"></input>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function popUp(id, tanggal, waktu, mahasiswa) {
                    document.querySelector('#popdel input[name="id"]').value = id;
                    document.querySelector('#popdel input[name="tanggal"]').value = tanggal;
                    document.querySelector('#popdel input[name="waktu"]').value = waktu;
                    document.querySelector('#popdel input[name="mahasiswa"]').value = mahasiswa;
                }
            </script>

            <?php $this->view("fit/footer", $data);?>