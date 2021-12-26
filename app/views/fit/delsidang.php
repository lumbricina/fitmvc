<?php 
$data['page_title'] = "DelJadwalSidang";$this->view("fit/headeradmin", $data);
include("koneksi.php");

   if(isset($_POST['submit']))
   {   $id = $_POST['id'];
       $date = $_POST['tanggal'];
       $time = $_POST['waktu'];
       $isi = $_POST['mahasiswa'];
   
       $deletesidang="DELETE FROM jadwalsidang WHERE jadwalsidang.id = '$id'";
   
       if(mysqli_query($conn, $deletesidang)){
           header('location:jadwalsidang');
       }else{
           echo "eror: " . mysqli_error($conn);
           header('Refresh : 3, location:jadwalsidang');
       }
   }
   
$query="SELECT * from jadwalsidang"


?>
<html>

<body>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Persetujuan Proposal</h1>                      
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
                            <h7 class="text-gray-900 mb-4">Mahasiswa</h7>
                                <input type="text" readonly class="form-control form-control-user" name="nama"  value="<?php echo $row['id']; ?>">
                                    <br>
                            <h7 class="text-gray-900 mb-4">Pembimbing1</h7>
                                <input type="text" readonly class="form-control form-control-user" name="pembimbing1" class="txtField" value="<?php echo $row['tanggal']; ?>">
                                    <br>
                            <h7 class="text-gray-900 mb-4">Pembimbing2</h7>
                                <input type="text" readonly class="form-control form-control-user" name="pembimbing2" class="txtField" value="<?php echo $row['waktu']; ?>">
                                    <br>
                            <h7 class="text-gray-900 mb-4">Judul</h7>
                                <input type="text" readonly class="form-control form-control-user" name="judul" class="txtField" value="<?php echo $row['mahasiswa']; ?>">
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
