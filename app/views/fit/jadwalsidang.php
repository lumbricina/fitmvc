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
$result = mysqli_query($conn, "SELECT jadwalsidang.tanggal, jadwalsidang.waktu, jadwalsidang.mahasiswa, proposal.judul, proposal.pembimbing1, proposal.pembimbing2 FROM proposal, jadwalsidang ON proposal.nama=jadwalsidang.mahasiswa");
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
                            <h7 class="text-gray-900 mb-4">Nama Mahasiswa</h7>
                                                                
                                    <input type="text" class="form-control form-control-user"
                                    id="text" aria-describedby="text"                                        
                                    placeholder="masukan isi" autocomplete="off">
                            </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" form="jadwal" value="Submit">Submit</button>                                                  
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
                                            #$result = $conn->query($query);
                                            #if ($result->num_rows > 0) {
                                                while($row = $result->mysqli_fetch_alias_array()) {
                                        ?>
                                        <tr>
                                            <td><?php echo$row["tanggal"];?></td>
                                            <td><?php echo$row["waktu"];?></td>
                                            <td><?php echo$row["mahasiswa"];?></td>
                                            <td><?php echo$row["proposal.judul"];?></td>
                                            <td><?php echo$row["proposal.pembimbing1"];?></td>
                                            <td><?php echo$row["proposal.pembimbing2"];}?></td>
                                            <td>
                                                <div class="row">
                                                <div class="dropdown no-arrow ml-2">
                                                    <button class="btn btn-warning btn-circle btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in" title="edit/delete" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
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

            <?php $this->view("fit/footer", $data);?>