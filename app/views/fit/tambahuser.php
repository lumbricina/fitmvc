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
$data['page_title'] = "Tambah User";
$this->view("fit/headeradmin", $data);
include('koneksi.php');





?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah User</h1>
                    <p class="mb-4">Role 1 : admin, 2 : dosen, 3 : mahasiswa, 4 : pembimbing 2 (luar dosen) 
                        <br> Username dan password akan dikirim ke email user</p>

                    <!-- Form Lobi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data user</h6>
                        </div>
                        <div class="card-body">
                        <form name="adduser" action="adduser" method="POST">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Nama</h7>                                 
                                    <input type="text" class="form-control form-control-user"
                                        id="nama" name="nama" placeholder="Nama">
                                </div>
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Username</h7>                                 
                                    <input type="text" class="form-control form-control-user"
                                        id="uname" name="uname" placeholder="Username">
                                </div>
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Email</h7>                                 
                                    <input type="text" class="form-control form-control-user"
                                        id="email" name="email" placeholder="Email"> 
                                    </div> </div>                                            
                            <h7 class="text-gray-900 mb-4">Role</h7>
                                <select name='role' id='role' class='form-control form-control-user mb-2'>
                                    <option value='' disabled selected>Pilih Role</option>
                                    <option value='1'>Admin</option>
                                    <option value='2'>Dosen</option>
                                    <option value='3'>Mahasiswa</option>
                                    <option value='4'>Eksternal</option>
                                </select>

                            </div>
                                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Submit"></input>                                                  
                            </div></form></div>


                   

            <?php  $this->view("fit/footer", $data);?>