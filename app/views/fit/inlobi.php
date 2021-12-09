<?php

include('koneksi.php');

                if(isset($_POST['lobi']))
                            {
                                $mahasiswa = $_SESSION['user']['nama'];
                                $date = $_POST['date'];
                                $time = $_POST['time'];
                                $isi = $_POST['isi'];
                                mysqli_query($conn,"INSERT INTO lobi (id, date, time, isi) VALUES (NULL, '$date', '$time', '$isi')");
                                header('location:lobi');
                            }

                            else{
                                echo "eror: " . mysqli_error($conn);
                                header('Refresh : 3, location:lobi');
                            }
?>