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
$data['page_title'] = "Proposal";$this->view("fit/headeradmin", $data);
include('koneksi.php');
$nama=$_SESSION['user']['nama'];
$query = "SELECT * FROM proposal";?>

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
                            <div class="table-responsive-sm" style="overflow-x:auto;">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tgl</th>
                                            <th>Mahasiswa</th>
                                            <th>Judul</th>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Ringkasan</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Revisi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo$row["date"];?></td>
                                            <td><?php echo$row["nama"];?></td>
                                            <td><?php echo$row["judul"];?></td>
                                            <td><?php echo$row["pembimbing1"];?></td>
                                            <td><?php echo$row["pembimbing2"];?></td>
                                            <td><div style="max-width: 275px; max-height: 200px; overflow-y: auto; padding: right -100px;"><?php echo$row["ringkasan"];?></div></td>
                                            <td><a href="uploadPengajuan/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                                            <td><?php if($row["status"]=='1'){
                                                echo 'belum disetujui';
                                            }elseif($row["status"]=='2'){
                                                echo 'perlu revisi';
                                            }elseif($row["status"]=='3'){
                                                echo 'sudah disetujui';
                                            }else{};?></td>
                                            <td><?php echo$row["revisi"];?></td>
                                            <td>
                                                <div class="row">
                                                <div class="dropdown no-arrow ml-2">
                                                    <button class="btn btn-warning btn-circle btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="modal" aria-haspopup="true" data-target="#poprevisi" aria-expanded="false" title="Revisi/Ubah pembimbing2" onclick="popUpRevisi('<?= $row['nama']; ?>', '<?= $row['pembimbing1']; ?>', '<?= $row['pembimbing2']; ?>')">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    </button>
                                                </div>
                                                <a href="setujui?nama=<?php echo $row['nama']; ?>&pembimbing1=<?php echo $row['pembimbing1']; ?>&pembimbing2=<?php echo $row['pembimbing2']; ?>&judul=<?php echo $row['judul']; ?>" class="btn btn-success btn-circle btn-sm ml-2" id="setujui" name="setujui"><i class="fas fa-check"> </i></a>
                                                <!--<i class="fas fa-check"> </i>
                                                    <form action="setujui" method="REQUEST" id="setujui" name="setujui">
                                                    <input class="btn btn-success btn-circle btn-sm ml-2" type="submit" name="setuju" id="setuju" title="Setujui" value="" data-target="#setuju" onclick="popSetuju('<?= $row['nama']; ?>', '<?= $row['pembimbing1']; ?>', '<?= $row['pembimbing2']; ?>')">
                                                    </form></input>-->
                                            </div></div>
                                            </td>
                                        </tr><?php }};?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                   

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
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
                            <form name="revisi" id="revisi" action="revisi" method="POST">
                            <div class="px-3 pb-3"><input readonly name="mhs" id="mhs" class="form-control form-control-user" /></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="pem1" id="pem1" /></div>
                            <div class="px-3 pb-3">
                            <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM user WHERE role='2' or role='4';");
                                    
                                    echo "<select name='pem2' id='pem2' class='form-control form-control-user mb-2'>";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='".$row['nama'] . "'>" . $row['nama'] . "</option>";
                                    }
                                    echo "</select>"?>
                            </div>

                            <!--<div class="px-3 pb-3"><input class="form-control form-control-user" name="pem2" id="pem2" /></div>-->
                            <div class="px-3 pb-3"><input type="text" name="isirevisi" class="form-control form-control-user" id="isirevisi" aria-describedby="text" placeholder="masukan isi revisi" autocomplete="off">
                        </div></div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-primary" type="submit" value="Submit"></input>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function popUpRevisi(nama, pem1, pem2) {
                    document.querySelector('#poprevisi input[name="mhs"]').value = nama;
                    document.querySelector('#poprevisi input[name="pem1"]').value = pem1;
                    document.querySelector('#poprevisi input[name="pem2"]').value = pem2;
                }


                
            </script>

           

            <?php $this->view("fit/footer", $data);?>