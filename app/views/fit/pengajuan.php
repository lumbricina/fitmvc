<?php 
    if(!isset($_SESSION['user'])){
        header('location:login');
        session_destroy();
    }else {

    }
    
?><?php $data['page_title'] = "Pengajuan";$this->view("fit/header", $data); include('koneksi.php');?>

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
                            <form action="uppropo/process" method="POST">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-6">
                            <h7 class="text-gray-900 mb-4">Pembimbing 1</h7>
                                <?php 
                                    $result = mysqli_query($conn, "SELECT * FROM user WHERE role='2';");
                                    
                                    echo "<select name='pem1' id='pem1' class='form-control form-control-user mb-2'";
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
                                    name='pem2' id='pem2' aria-describedby="text">
                                    </div> 
                                </div>                                            
                                <h7 class="text-gray-900 mb-4">Judul Tugas Akhir</h7>
                                    <input type="text" class="form-control form-control-user mb-2"
                                    id="text" name="judul" aria-describedby="text"                                        
                                    placeholder="masukan judul" autocomplete="off">
                                <h7 class="text-gray-900 mb-4">Ringkasan</h7>
                                    <textarea type="text" name="ringkasan"class="form-control form-control-user mb-2"
                                    id="text" aria-describedby="text"                                        
                                    placeholder="masukan ringkasan" autocomplete="off"> </textarea>
                            </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" form="lobi" value="submit"></input>  
                            </form>                                                
                        </div>
                    </div>

                    <?php
                    require('koneksi.php');
                    $mahasiswa = $_SESSION['user']['nama'];
                    $pembimbing1 = $_POST['pem1'];
                    $pembimbing2 = $_POST['pem2'];
                    $judul = $_POST['judul'];
                    $ringkasan = $_POST['ringkasan'];

                    if(isset($_POST["submit"])){
                        if($prop="INSERT INTO proposal (id, time, mahasiswa, pembimbing1, pembimbing2, judul, ringkasan) VALUES (``, timestamp, `$mahasiswa`,`$pembimbing1`,`$pembimbing2`,`$judul`,`$ringkasan`);");
                    }

            
            mysqli_query($conn, $prop);
                    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];

    if(isset($_POST["submit"])){
        if($query = mysql_query("INSERT INTO users ('id', 'username', 'password', 'email') VALUES('', '".$username."', '".$password."', '".$email."')")){
            echo "Success";
        }else{
            echo "Failure" . mysql_error();
        }
    }
?>

                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Logging</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Pembimbing 1</th>
                                            <th>Pembimbing 2</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                            <th>Feedback / Revisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Lala</td>
                                            <td>Nina</td>
                                            <td>Aplikasi something</td>
                                            <td>acc/tolak</td>
                                            <td>pidback</td>
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