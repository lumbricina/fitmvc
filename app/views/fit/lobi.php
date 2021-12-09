<?php $data['page_title'] = "Lobi";
$this->view("fit/header", $data);
include('koneksi.php');
$nama=$_SESSION['user']['nama'];
$query = "SELECT*FROM lobi WHERE nama='$nama'";

echo'

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Log Book</h1>
                    <p class="mb-4">Diary</p>

                    <!-- Form Lobi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Lobi</h6>
                        </div>
                        <div class="card-body">
                        <form name="lobi" action="inlobi" method="POST">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Tanggal</h7>                                 
                                    <input type="date" class="form-control form-control-user"
                                        id="date" name="date">
                                </div>
                                <div class="col-lg-4">
                            <h7 class="text-gray-900 mb-4">Waktu</h7>                                 
                                    <input type="time" class="form-control form-control-user"
                                        id="time" name="time"> 
                                    </div> </div>                                            
                            <h7 class="text-gray-900 mb-4">Isi</h7>
                                                                
                                    <input type="text" class="form-control form-control-user"
                                    id="text" name="isi"                                        
                                    placeholder="masukan isi" autocomplete="off">
                            </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Submit"></input>                                                  
                            </div></form></div>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Logging</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">';
                            $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Isi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    while($row = $result->fetch_assoc()) {
                                    echo '<tr>
                                            <td>',$row["date"],'</td>
                                            <td>',$row["time"],'</td>
                                            <td>',$row["isi"],'</td>
                                            <td>',$row["status"],'</td>
                                            <td>
                                                <div class="row">
                                                <div class="dropdown no-arrow ml-2">
                                                    <button class="btn btn-warning btn-circle btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                                <a class="btn btn-success btn-circle btn-sm ml-2" href="#"><i class="fas fa-check"></i></a>
                                            </div></div>
                                            </td>
                                        </tr>
                                    </tbody>';}
                                '</table>';}
                            '</div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
';
             $this->view("fit/footer", $data);?>