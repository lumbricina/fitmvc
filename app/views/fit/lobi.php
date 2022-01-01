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
$data['page_title'] = "Lobi";
$this->view("fit/header", $data);
include('koneksi.php');
$nama=$_SESSION['user']['nama'];
$query = "SELECT*FROM lobi WHERE nama='$nama'";
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Log Book</h1>
                    <p class="mb-4">Mahasiswa harap mengisi log book sesuai dengan pengerjaan tugas akhir dan lampirkan bukti dalam bentuk gambar maupun doc/pdf</p>

                    <!-- Form Lobi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Lobi</h6>
                        </div>
                        <div class="card-body">
                        <form name="lobi" action="inlobi" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Tanggal</h7>                                 
                                    <input type="date" class="form-control form-control-user"
                                        id="date" name="date" require>
                                </div>
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Waktu</h7>                                 
                                    <input type="time" class="form-control form-control-user"
                                        id="time" name="time" require> 
                                    </div> </div>                                            
                            <h7 class="text-gray-900 mb-4">Isi</h7>
                                                                
                                    <input type="text" class="form-control form-control-user"
                                    id="text" name="isi"                                        
                                    placeholder="masukan isi" autocomplete="off" require>
                            <h7 class="text-gray-900 mb-4">Upload File</h7>
                                    <input type="file" accept="image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" id="file1" name="file1" class="form-control form-control-file">
                            </div>

                            
                            
                            </div>
                            

                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit"></input>
                            <!-- <input type="hidden" name="button_pressed" value="1" onclick="sendEmail()" /> -->
                            </div></form>
<!-- 
<script>
function sendemail()
{
    var url = '/sendEmail.php';

    new Ajax.Request(url,{
            onComplete:function(transport)
            {
                var feedback = transport.responseText.evalJSON();
                if(feedback.result==0)
                    alert('There was a problem sending the email, please try again.');
            }
        });

}
</script> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Logging</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                           <?php $result = $conn->query($query);
                                if ($result->num_rows > 0) { ?>
                                <table class="table table-bordered" style="overflow-x:auto;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Isi</th>
                                            <th>Status</th>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php while($row = $result->fetch_assoc()) { ?>
                                        <tr>
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
                                            <td>
                                                <div class="row">
                                                <a href="edit?id_lobi=<?php echo $row['id_lobi']; ?>&date=<?php echo $row['date']; ?>&time=<?php echo $row['time']; ?>&isi=<?php echo $row['isi']; ?>" class="btn btn-success btn-circle btn-sm ml-2" id="edit" name="edit"><i class="fas fa-edit"> </i></a>
                                                    <button class="btn btn-danger btn-circle btn-sm ml-2" type="button"
                                                    data-toggle="modal" aria-haspopup="true" data-target="#popdel" aria-expanded="false" title="Delete" onclick="popUp('<?= $row['id_lobi']; ?>','<?= $row['date']; ?>', '<?= $row['time']; ?>', '<?= $row['isi']; ?>','<?= $row['filename']; ?>')">
                                                    <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td><?php }; ?>
                                        </tr>
                                    </tbody>
                                </table><?php };?>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal Edit -->
            <div class="modal fade" id="popdel" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="label">Edit</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Delete Data Lobi</div>
                        <div class="form-group px-3 pb-3">
                            <form name="delete" id="delete" action="delete" method="POST">
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="id_lobi" id="id_lobi"></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" type="date" name="date" id="date"></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" type="time" name="time" id="time"></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="isi" id="isi"></div>
                            <div class="px-3 pb-3"><input readonly class="form-control form-control-user" name="filename" id="filename"></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-primary" type="submit" value="Submit"></input>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function popUp(id_lobi, date, time, isi, filename) {
                    document.querySelector('#popdel input[name="id_lobi"]').value = id_lobi;
                    document.querySelector('#popdel input[name="date"]').value = date;
                    document.querySelector('#popdel input[name="time"]').value = time;
                    document.querySelector('#popdel input[name="isi"]').value = isi;
                    document.querySelector('#popdel input[name="filename"]').value = filename;
                }
            </script>


            <?php  $this->view("fit/footer", $data);?>