<?php 
if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}elseif ($_SESSION['user']['role']!='4') {
    session_destroy();
}elseif ($_SESSION['user']['role']=='3') {
    session_destroy();
}elseif ($_SESSION['user']['role']=='2') {
    session_destroy();
}else {

}
$data['page_title'] = "Penilaian";
$this->view("fit/headerpem2", $data);
include('koneksi.php');
$role=$_SESSION['user']['role'];
$uname=$_SESSION['user']['username'];
$query = "SELECT * FROM hasilsidang WHERE username='$uname'";


?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Penilaian</h1>
                    <p class="mb-4">Masukkan nilai</p>

                    <!-- Form Lobi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Penilaian</h6>
                        </div>
                        <div class="card-body">
                        <form name="submitnilai" action="submitnilai" method="POST">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Mahasiswa</h7>                                 
                                    <input type="text" class="form-control form-control-user"
                                        id="mhs" name="mhs" placeholder="Nama Mahasiswa">
                                </div>
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Masukkan nilai sebagai :</h7>
                            <select name='role' id='role' class='form-control form-control-user mb-2'>
                                    <option value='' disabled selected>Pilih Role</option>
                                    <option value='1'>Penilai 1</option>
                                    <option value='2'>Penilai 2</option>
                                    <option value='3'>Penilai 3</option>
                                    <option value='4'>Pembimbing 1</option>
                                    <option value='5'>Pembimbing 2</option>
                                </select>
                                </div></div>
                                <div class="row">
                                    <h6 class="m-0 font-weight-bold text-primary">Masukkan Nilai</h6>
                                </div>
                                <div class="row">
                                <div class="col-lg-2">
                                <h7 class="text-gray-900 mb-4">Kategori 1 </h7>                                 
                                    <input type="number" min="0" max="25" class="form-control form-control-user"
                                        id="n1" name="n1" placeholder="n1"> 
                                    </div> <div class="col-lg-2">
                                <h7 class="text-gray-900 mb-4">Kategori 2 </h7>                                 
                                    <input type="number" min="0" max="25" class="form-control form-control-user"
                                        id="n2" name="n2" placeholder="n2"> 
                                    </div><div class="col-lg-2">
                                <h7 class="text-gray-900 mb-4">Kategori 3 </h7>                                 
                                    <input type="number" min="0" max="25" class="form-control form-control-user"
                                        id="n3" name="n3" placeholder="n3"> 
                                    </div><div class="col-lg-2">
                                <h7 class="text-gray-900 mb-4">Kategori 4 </h7>                                 
                                    <input type="number" min="0" max="25" class="form-control form-control-user"
                                        id="n4" name="n4" placeholder="n4"> 
                                    </div></div>
                                    <div class="row">
                                <div class="col-lg-8">
                                <h7 class="text-gray-900 mb-4">Revisi</h7>                                 
                                    <input type="text" class="form-control form-control-user"
                                        id="rev" name="rev" placeholder="revisi"> 
                                    </div>

                            </div>
                                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Submit"></input>                                                  
                            </div></form></div></div>

                        
                            <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Nilai</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                           <?php $result = $conn->query($query);
                                if ($result->num_rows > 0) { ?>
                                <table class="table table-bordered" style="overflow-x:auto;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mahasiswa</th>
                                            <th>Role</th>
                                            <th>Nilai 1</th>
                                            <th>Nilai 2</th>
                                            <th>Nilai 3</th>
                                            <th>Nilai 4</th>
                                            <th>Total</th>
                                            <th>Revisi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php while($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo$row["mahasiswa"];?></td>
                                            <td><?php echo$row["role"];?></td>
                                            <td><?php echo$row["nilai1"];?></td>
                                            <td><?php echo$row["nilai2"];?></td>
                                            <td><?php echo$row["nilai3"];?></td>
                                            <td><?php echo$row["nilai4"];?></td>
                                            <td><?php #INI BELOM BENER?></td>
                                            <td><?php echo$row["revisi"];?></td>
                                            <td>
                                                <!-- Ini belom bener ke bawah. b elom tested juga -->
                                                <div class="row">
                                                <a href="edit?id_lobi=<?php echo $row['id_lobi']; ?>&date=<?php echo $row['date']; ?>&time=<?php echo $row['time']; ?>&isi=<?php echo $row['isi']; ?>" class="btn btn-success btn-circle btn-sm ml-2" id="edit" name="edit"><i class="fas fa-edit"> </i></a>
                                                    <button class="btn btn-danger btn-circle btn-sm ml-2" type="button"
                                                    data-toggle="modal" aria-haspopup="true" data-target="#popdel" aria-expanded="false" title="Delete" onclick="popUp('<?= $row['id_lobi']; ?>','<?= $row['date']; ?>', '<?= $row['time']; ?>', '<?= $row['isi']; ?>')">
                                                    <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td><?php }; ?>
                                        </tr>
                                    </tbody>
                                </table><?php };?>


                   

            <?php  $this->view("fit/footer", $data);?>