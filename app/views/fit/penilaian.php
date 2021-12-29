<?php 
if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}else {

}
$data['page_title'] = "Penilaian";

if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}elseif ($_SESSION['user']['role']=='2') {
    $this->view("fit/headerdosen",$data);
}elseif ($_SESSION['user']['role']=='4') {
    $this->view("fit/headerpem2",$data);
}
include('koneksi.php');

$uname=$_SESSION['user']['username'];
$role1=$_SESSION['user']['role'];
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
                                <div class="col-lg-5">
                            <h7 class="text-gray-900 mb-4">Mahasiswa</h7>
                            <?php 
                                    $res = mysqli_query($conn, "SELECT * FROM jadwalsidang;");
                                    
                                    echo "<select name='mahasiswa' id='mahasiswa' class='form-control form-control-user mb-2'>";
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<option value='".$row['mahasiswa'] . "'>" . $row['mahasiswa'] . "</option>";
                                    }
                                    echo "</select>"?>
                                </div>
                                <div class="col-lg-3">
                            <h7 class="text-gray-900 mb-4">Masukkan nilai sebagai :</h7>
                                <input readonly type="text" class="form-control form-control-user" value="<?php 
                                if($role1=='1'){
                                    echo 'Admin';
                                }elseif($role1=='2'){
                                    echo 'Dosen IT';
                                }elseif($role1==='4'){
                                    echo 'Dosen Luar';
                                }else{}; #ini buat yg diliat aja?>">
                                <input hidden type="text" class="form-control form-control-user"
                                        id="role" name="role" value="<?php echo$role1;#ini buat inputnya ke database?>">  
                                </div>
                                <div class="col-lg-3">
                            <h7 class="text-gray-900 mb-4">Peran :</h7>
                            <select name='peran' id='peran' class='form-control form-control-user mb-2'>
                                <option value='pen1'> Penilai 1 </option>
                                <option value='pen2'> Penilai 2 </option>
                                <option value='pen3'> Penilai 3 </option>
                                <option value='pem1'> Pembimbing 1 </option>
                                <option value='pem2'> Pembimbing 2 </option>
                            </select>
                                </div> </div>
                                <div class="row">
                                    <h6 class="ml-2 mt-3 font-weight-bold text-primary">Masukkan Nilai</h6>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                <h7 class="text-gray-900 mb-4">Kategori 1 </h7>                                 
                                    <input type="number" min="0" max="25" class="form-control form-control-user"
                                        id="n1" name="n1" placeholder="n1"> 
                                    </div> <div class="col-lg-3">
                                <h7 class="text-gray-900 mb-4">Kategori 2 </h7>                                 
                                    <input type="number" min="0" max="25" class="form-control form-control-user"
                                        id="n2" name="n2" placeholder="n2"> 
                                    </div><div class="col-lg-3">
                                <h7 class="text-gray-900 mb-4">Kategori 3 </h7>                                 
                                    <input type="number" min="0" max="25" class="form-control form-control-user"
                                        id="n3" name="n3" placeholder="n3"> 
                                    </div><div class="col-lg-3">
                                <h7 class="text-gray-900 mb-4">Kategori 4 </h7>                                 
                                    <input type="number" min="0" max="25" class="form-control form-control-user"
                                        id="n4" name="n4" placeholder="n4"> 
                                    </div></div>
                                    <div class="row">
                                <div class="col-lg-12 mt-2">
                                <h7 class="text-gray-900 mb-4">Revisi</h7>                                 
                                    <input type="text" class="form-control form-control-user"
                                        id="rev" name="rev" placeholder="revisi"> 
                                    </div>

                            </div>
                                <input id="btnsubmit" type="submit" name="btnsubmit" class="mt-2 btn btn-primary btn-user btn-block" value="Submit"></input>                                                  
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
                                   <?php while($row = $result->fetch_assoc()) {
                                       $total=  $row["nilai1"]+$row["nilai2"]+$row["nilai3"]+$row["nilai4"];?>
                                        <tr>
                                            <td><?php echo$row["mahasiswa"];?></td>
                                            <td><?php 
                                            if($row["role"]=='1'){
                                                echo 'Admin ';
                                            }elseif($row["role"]=='2'){
                                                echo  $row["username"],' (Dosen IT)';
                                            }elseif($row["role"]==='4'){
                                                echo $row["username"],' (Dosen Luar)';
                                            }else{}; #ini buat yg diliat aja?></td>
                                            <td><?php echo$row["nilai1"];?></td>
                                            <td><?php echo$row["nilai2"];?></td>
                                            <td><?php echo$row["nilai3"];?></td>
                                            <td><?php echo$row["nilai4"];?></td>
                                            <td><?php echo$total;?></td>
                                            <td><?php echo$row["revisi"];?></td>
                                            <?php }; ?>
                                        </tr>
                                    </tbody>
                                </table><?php };?>


                   

            <?php  $this->view("fit/footer", $data);?>