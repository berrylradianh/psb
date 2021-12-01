<?php
    if(isset($_GET['id_user'])){
        $id_user = $_GET['id_user'];
    }
    error_reporting(0);

    $db_name 	= "psb";
    $host		= "localhost";
    $username	= "root";
    $password	= "";

    $conn 		= mysqli_connect($host,$username,$password,$db_name) or die("Database connection error!");

    $query = mysqli_query($conn, "SELECT * FROM detail_pendaftaran AS dp JOIN pendaftaran AS p ON dp.id_user = p.id
                          JOIN akun AS a ON a.id_user = p.id
                          WHERE dp.id_user = $id_user ");
    $rows = mysqli_fetch_array($query);
?>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<link rel="stylesheet" href="style3.css">

<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" ty<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Delete Data</h4>
                <p class="category">Delete Data yang diinginkan</p>
            </div>
            <div class="card-content">
                <?php  
                if ($upload_akte != "" && $upload_kartu_keluarga != "" && $upload_rapor != "" || $upload_piagam_prestasi != "") {
                        $queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
                        $execx      =   mysqli_query($conn, $queryx);
                        if($execx){
                            $daftar = mysqli_fetch_array($execx);

                        }else{
                            echo 'gagal';
                        }

                        if ($daftar['status_pendaftaran'] == 1) {
                            echo "<div class='alert alert-success alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Selamat!</strong> pendaftaran anda sudah dikonfirmasi Admin. Selanjutnya, cetak kwitansi pembayaran <a href='index.php?page=9'><u>di menu pembayaran</u></a>. dan lakukan konfirmasi pembayaran setelah melakukan pembayaran.
                            </div>";
                        }else if ($daftar['status_pendaftaran'] == 2) {
                            echo "<div class='alert alert-warning alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Anda sudah melakukan pembayaran</strong> 
                            </div>";
                        }else if($daftar['status_pendaftaran'] == 0){
                            echo "<div class='alert alert-warning alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Persyaratan sudah lengkap. tunggu konfirmasi admin paling lambat 2 hari kerja</strong> 
                            </div>";
                        }
                    
                }
                ?>
                


                <h3>Berikut adalah data yang dapat dihapus :</h3>
                <ol>
                    <li> 
                        <?php 

                            if ($upload_kartu_keluarga != "") {

                                if ($daftar['status_pendaftaran'] == 1) {
                                    echo '<font color="#2ecc71">Kartu Keluarga   <i class="fa fa-check"></i></font>';
                                }else if($daftar['status_pendaftaran'] >= 2){
                                    echo '<font color="#2ecc71">Kartu Keluarga   <i class="fa fa-check"></i></font>';
                                }else{
                                  echo '<font color="#2ecc71">Kartu Keluarga   <i class="fa fa-check"></i></font> <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                                }

                                
                            }else{
                                echo 'Kartu Keluarga &rArr; <a href="index.php?page=10" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                            }
                        
                        ?>
                    </li>
                    <li> 
                        <?php 

                            if ($upload_akte != "") {

                                if ($daftar['status_pendaftaran'] == 1) {
                                    echo '<font color="#2ecc71">Akte kelahiran   <i class="fa fa-check"></i></font>';
                                }else if($daftar['status_pendaftaran'] >= 2){
                                    echo '<font color="#2ecc71">Akte kelahiran   <i class="fa fa-check"></i></font>';
                                }else{
                                  echo '<font color="#2ecc71">Akte kelahiran   <i class="fa fa-check"></i></font> <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                                }

                                
                            }else{
                                echo 'Akte kelahiran &rArr; <a href="index.php?page=9" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                            }
                        
                        ?>
                    </li>
                    <li>
                        <?php 

                            if ($upload_rapor != "") {

                                if ($daftar['status_pendaftaran'] == 1) {
                                    echo '<font color="#2ecc71">Scan Rapor   <i class="fa fa-check"></i></font>';
                                }else if($daftar['status_pendaftaran'] >= 2){
                                    echo '<font color="#2ecc71">Scan rapor   <i class="fa fa-check"></i></font>';
                                }else{
                                    echo '<font color="#2ecc71">Scan rapor   <i class="fa fa-check"></i></font> <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                                }
                                
                            }else{
                                echo 'Scan rapor &rArr; <a href="index.php?page=11" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                            }

                        ?>
                    </li>
                    <li>
                        <?php 

                            if ($upload_piagam_prestasi != "" ) {

                                if ($daftar['status_pendaftaran'] == 1) {
                                    echo '<font color="#2ecc71">piagam prestasi <i class="fa fa-check"></i></font>';
                                }else if($daftar['status_pendaftaran'] >= 2){
                                    echo '<font color="#2ecc71">piagam prestasi   <i class="fa fa-check"></i></font>';
                                }else{
                                    echo '<font color="#2ecc71">piagam prestasi   <i class="fa fa-check"></i></font> <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                                }
                                
                            }else{
                                echo 'piagam prestasi &rArr; <a href="index.php?page=12" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                            }
                        
                        ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>pe="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/chartist.min.js"></script>
<script src="../assets/js/arrive.min.js"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/js/bootstrap-notify.js"></script>
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="../assets/js/demo.js"></script>

<div class="row" >
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <h2>Status Pendaftaran</h2>
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Pengumuman</h4>
            </div>
            <div class="card-content">
				<table class="table table-hover">
				    <tbody>
                        <tr>
                            <td><b>Nama</b></td>
                            <td>: <?php echo $rows['nama']; ?></td>
                        </tr>
						<tr>
                            <td><b>Email</b></td>
                            <td>: <?php echo $rows['email']; ?> </td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td >: <?php echo $rows['status_pendaftaran'];; ?></td>
                        </tr>
				    </tbody>
				</table>
            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);