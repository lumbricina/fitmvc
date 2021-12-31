<?php 
if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}elseif ($_SESSION['user']['role']=='3') {
    session_destroy();
}elseif ($_SESSION['user']['role']=='1') {
    session_destroy();
}else {

}
    
    $data['page_title'] = "LobiDosen"; include("koneksi.php");

    if(!isset($_SESSION['user'])){
        header('location:login');
        session_destroy();
    }elseif ($_SESSION['user']['role']=='2') {
        $this->view("fit/headerdosen", $data);
        $user=$_SESSION['user']['nama'];
        $query = "SELECT lobi.* FROM lobi INNER JOIN pembimbing ON lobi.nama=pembimbing.mahasiswa WHERE pembimbing.pembimbing1='$user'";
        }elseif ($_SESSION['user']['role']=='4') {
            $this->view("fit/headerpem2", $data);
            $user=$_SESSION['user']['nama'];
            $query = "SELECT lobi.* FROM lobi INNER JOIN pembimbing ON lobi.nama=pembimbing.mahasiswa WHERE pembimbing.pembimbing2='$user'";}
    
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
                                            <th>File</th>
                                            <th>Revisi</th>
                                            <?php if ($_SESSION['user']['role']=='2') {
                                            echo '<th>Action</th>';}?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php while($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo$row["nama"];?></td>  
                                            <td><?php echo$row["date"];?></td>
                                            <td><?php echo$row["time"];?></td>
                                            <td><?php echo$row["isi"];?></td>
                                            <td><?php if($row["status"]=='1'){
                                                echo 'belum disetujui';
                                            }elseif($row["status"]=='2'){
                                                echo 'perlu revisi';
                                            }elseif($row["status"]=='3'){
                                                echo 'sudah disetujui';
                                            }else{};?></td>
                                            <td><a href="uploadLobi/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                                            <td><?php echo$row["revisi"];?></td>
                                            <?php if ($_SESSION['user']['role']=='2') {?>
                                            <td>
                                            <div class="row">
                                                <div class="dropdown no-arrow ml-2">
                                                    <button class="btn btn-warning btn-circle btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="modal" aria-haspopup="true" data-target="#poprevisi" aria-expanded="false" title="Revisi" onclick="popUpRevisi('<?= $row['nama']; ?>', '<?= $row['date']; ?>', '<?= $row['time']; ?>')">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    </button>
                                                </div>
                                                <a href="setujuilobi?nama=<?php echo $row['nama']; ?>&pembimbing1=<?php echo $user; ?>&date=<?php echo $row['date']; ?>&time=<?php echo $row['time']; ?>&isi=<?php echo $row['isi']; ?>" class="btn btn-success btn-circle btn-sm ml-2" id="setujuilobi" name="setujuilobi"><i class="fas fa-check"> </i></a>
                                                <!--<i class="fas fa-check"> </i>
                                                    <form action="setujui" method="REQUEST" id="setujui" name="setujui">
                                                    <input class="btn btn-success btn-circle btn-sm ml-2" type="submit" name="setuju" id="setuju" title="Setujui" value="" data-target="#setuju" onclick="popSetuju('<?= $row['nama']; ?>', '<?= $row['pembimbing1']; ?>', '<?= $row['pembimbing2']; ?>')">
                                                    </form></input>-->
                                            </div></div>
                                            </td><?php }};?>
                                        </tr>
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
                            <form name="revisilobi" id="revisilobi" action="revisilobi" method="POST">
                            <div class="px-3 pb-3"><input readonly name="nama" id="nama" class="form-control form-control-user" /></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="date" id="date" /></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="time" id="time" /></div>
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
                function popUpRevisi(nama, date, time) {
                    document.querySelector('#poprevisi input[name="nama"]').value = nama;
                    document.querySelector('#poprevisi input[name="date"]').value = date;
                    document.querySelector('#poprevisi input[name="time"]').value = time;
                }


                
            </script>

            <?php $this->view("fit/footer", $data);?>