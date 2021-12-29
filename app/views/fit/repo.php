<?php $data['page_title'] = "Repo"; 
 
 if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}elseif ($_SESSION['user']['role']=='3') {
    $this->view("fit/header",$data);
}elseif ($_SESSION['user']['role']=='1') {
    $this->view("fit/headeradmin",$data);
}elseif ($_SESSION['user']['role']=='2') {
    $this->view("fit/headerdosen",$data);
}
include('koneksi.php');
$nama=$_SESSION['user']['nama'];
if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}elseif ($_SESSION['user']['role']=='3') {
    $query = "SELECT * FROM proposal WHERE nama='$nama'";
}elseif ($_SESSION['user']['role']=='2') {
    $query = "SELECT * FROM proposal WHERE pembimbing1='$nama'";}
?>

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
                            <div class="table-responsive-sm" style="overflow-x:auto;">
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
                                    <?php
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo$row["nama"];?></td>
                                            <td><?php echo$row["judul"];?></td>
                                            <td><?php echo$row["pembimbing1"];?></td>
                                            <td><?php echo$row["pembimbing2"];?></td>
                                            <td><?php if($row["status"]=='1'){
                                                echo 'belum disetujui';
                                            }elseif($row["status"]=='2'){
                                                echo 'perlu revisi';
                                            }elseif($row["status"]=='3'){
                                                echo 'sudah disetujui';
                                            }else{};}}?></td>
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