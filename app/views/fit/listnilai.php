<?php 
if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}else {

}
$data['page_title'] = "ListNilai";

if(!isset($_SESSION['user'])){
    header('location:login');
    session_destroy();
}elseif ($_SESSION['user']['role']=='1') {
    $this->view("fit/headeradmin",$data);
    $query="SELECT * FROM hasilsidang";
}elseif ($_SESSION['user']['role']=='3') {
    $this->view("fit/header",$data);
    $namamhs=$_SESSION['user']['nama'];
    $query = "SELECT * FROM hasilsidang WHERE mahasiswa='$namamhs'";
}
include('koneksi.php');

$uname=$_SESSION['user']['username'];
$role1=$_SESSION['user']['role'];



?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List Nilai</h1>

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