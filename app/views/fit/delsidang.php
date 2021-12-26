<?php 
$data['page_title'] = "DelJadwalSidang";$this->view("fit/headeradmin", $data);
include("koneksi.php");

$id = $_GET['id'];
$date = $_GET['date'];
$time = $_GET['time'];
$mahasiswa = $_GET['mahasiswa'];


   if(isset($_POST['submit']))
   {   
       $deletesidang="DELETE FROM jadwalsidang WHERE id='$id' ";
       mysqli_query($conn, $deletesidang);
   }
   


?>
<html>

<body>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Delete Jadwal</h1>                      
</div>

<!-- Content Row -->
<div class="row">

<!-- Area Chart -->
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Yakin untuk mensetujui proposal ini? </h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                        <p> Untuk batal tekan tombol back (kembali ke halaman sebelumnya) </p>
                            <form method="POST" action="">
                            <h7 class="text-gray-900 mb-4">Tanggal</h7>
                                <input type="date" readonly class="form-control form-control-user" name="tanggal" class="txtField" value="<?php echo $date; ?>">
                                    <br>
                            <h7 class="text-gray-900 mb-4">Waktu</h7>
                                <input type="time" readonly class="form-control form-control-user" name="waktu" class="txtField" value="<?php echo $time; ?>">
                                    <br>
                            <h7 class="text-gray-900 mb-4">Mahasiswa</h7>
                                <input type="text" readonly class="form-control form-control-user" name="mahasiswa" class="txtField" value="<?php echo $mahasiswa; ?>">
                                    <br>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Delete" class="buttom">
                            </form>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
        

</body>
</html>
