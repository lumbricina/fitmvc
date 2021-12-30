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
                                <div class="col-lg-3">
                            <h7 class="text-gray-900 mb-4">Tanggal</h7>                                 
                                    <input type="date" class="form-control form-control-user"
                                        name="date" id="date" aria-describedby="date">
                                </div>
                                <div class="col-lg-3">
                            <h7 class="text-gray-900 mb-4">Waktu</h7>                                 
                                    <input type="time" name="time" class="form-control form-control-user"
                                        id="time" aria-describedby="time"> 
                                    </div> 
                            <div class="col-lg-6">                                            
                            <h7 class="text-gray-900 mb-4">Nama Mahasiswa</h7>
                                                        
                            <?php 
                                    $res = mysqli_query($conn, "SELECT * FROM pembimbing;");
                                    
                                    echo "<select name='mahasiswa' id='mahasiswa' class='form-control form-control-user mb-2'>";
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<option value='".$row['mahasiswa'] . "'>" . $row['mahasiswa'] . "</option>";
                                    }
                                    echo "</select>"?>
                            </div></div>
                            <div class="row">
                            <div class="col-lg-4">
                                <h7 class="text-gray-900 mb-4">Penilai 1</h7>                                 
                                    <?php 
                                            $rel = mysqli_query($conn, "SELECT * FROM user WHERE role='2';");
                                            
                                            echo "<select name='pen1' id='pen1' class='form-control form-control-user mb-2'>";
                                            while ($ro = mysqli_fetch_array($rel)) {
                                                echo "<option value='".$ro['nama'] . "'>" . $ro['nama'] . "</option>";
                                            }
                                            echo "</select>"?>
                                </div> 
                                <div class="col-lg-4">
                                <h7 class="text-gray-900 mb-4">Penilai 2</h7>                                 
                                    <?php 
                                            $rel = mysqli_query($conn, "SELECT * FROM user WHERE role='2';");
                                            
                                            echo "<select name='pen2' id='pen2' class='form-control form-control-user mb-2'>";
                                            while ($ro = mysqli_fetch_array($rel)) {
                                                echo "<option value='".$ro['nama'] . "'>" . $ro['nama'] . "</option>";
                                            }
                                            echo "</select>"?>
                                </div>
                                <div class="col-lg-4">
                                <h7 class="text-gray-900 mb-4">Penilai 3 (eksternal)</h7>                                 
                                    <?php 
                                            $rel = mysqli_query($conn, "SELECT * FROM user WHERE role='4';");
                                            
                                            echo "<select name='pen3' id='pen3' class='form-control form-control-user mb-2'>";
                                            while ($ro = mysqli_fetch_array($rel)) {
                                                echo "<option value='".$ro['nama'] . "'>" . $ro['nama'] . "</option>";
                                            }
                                            echo "</select>"?>
                                </div>
                            </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit"></input>                                                  
                            </div>
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
                                            <th>Penilai 1</th>
                                            <th>Penilai 2</th>
                                            <th>Penilai 3</th>
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
                                            <td><?php echo$row["penilai1"];?></td>
                                            <td><?php echo$row["penilai2"];?></td>
                                            <td><?php echo$row["penilai3"];?></td>
                                            <td>
                                                <div class="row">
                                                <a href="delsidang?id=<?php echo $row['id']; ?>&date=<?php echo $row['tanggal']; ?>&time=<?php echo $row['waktu']; ?>&mahasiswa=<?php echo $row['mahasiswa']; ?>" class="btn btn-danger btn-circle btn-sm ml-2" id="delete" name="delete"><i class="fas fa-trash"> </i></a>
                                                    </button>
                                                </div>
                                            </div>
                                            </td> <?php } ; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php $this->view("fit/footer", $data);?>