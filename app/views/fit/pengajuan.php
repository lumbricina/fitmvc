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
$data['page_title'] = "Pengajuan";$this->view("fit/header", $data); include('koneksi.php');
$nama=$_SESSION['user']['nama'];
$query = "SELECT*FROM proposal WHERE nama='$nama'";
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pengajuan Tugas Akhir</h1>

                    <!-- Form Pengajuan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan</h6>
                        </div>
                        <div class="card-body">
                            <form name="propo" action="uppropo" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-6">
                            <h7 class="text-gray-900 mb-4">Pembimbing 1</h7>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM user WHERE role='2';");
                                    
                                    echo "<select name='pem1' id='pem1' class='form-control form-control-user mb-2'>";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='".$row['nama'] . "'>" . $row['nama'] . "</option>";
                                    }
                                    echo "</select>"?>                                 
                                    <!-- <input type="text" class="form-control form-control-user mb-2"
                                        id="dosen" aria-describedby="text"> -->
                                </div>
                                <div class="col-lg-6">
                                <h7 class="text-gray-900 mb-4">Pembimbing 2</h7>                                 
                                    <input type="text" class="form-control form-control-user mb-2"
                                    name='pem2' id='pem2' aria-describedby="text" placeholder="nama pembimbing 2">
                                    </div> 
                                </div>                                            
                                <h7 class="text-gray-900 mb-4">Judul Tugas Akhir</h7>
                                    <input type="text" class="form-control form-control-user mb-2"
                                    id="text" name="judul" aria-describedby="text"                                        
                                    placeholder="masukan judul" autocomplete="off">
                                <h7 class="text-gray-900 mb-4">Ringkasan</h7>
                                    <textarea type="text" name="ringkasan" class="form-control form-control-user mb-2"
                                    id="text" aria-describedby="text"                                        
                                    placeholder="masukan ringkasan" autocomplete="off"></textarea>
                                <h7 class="text-gray-900 mb-4">Upload File</h7>
                                    <input type="file" accept=".doc, .docx, .pdf" id="file2" name="file2" class="form-control form-control-file">
                            </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="submit"></input>  
                            </form>                                                
                        </div>
                    </div>

                    

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
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Judul</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Feedback / Revisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result = $conn->query($query);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo$row["pembimbing1"];?></td>
                                            <td><?php echo$row["pembimbing2"];?></td>
                                            <td><?php echo$row["judul"];?></td>
                                            <td><a href="uploadPengajuan/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                                            <td><?php if($row["status"]=='1'){
                                                echo 'belum disetujui';
                                            }elseif($row["status"]=='2'){
                                                echo 'perlu revisi';
                                            }elseif($row["status"]=='3'){
                                                echo 'sudah disetujui';
                                            }else{};?></td>
                                            <td><?php echo$row["revisi"];}}?></td>
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