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
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/chartist.min.js"></script>
<script src="../assets/js/arrive.min.js"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/js/bootstrap-notify.js"></script>
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="../assets/js/demo.js"></script>

<div class="row" >
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <h2>Biodata Pendaftar</h2>
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title"><?php echo $rows['nama']; ?></h4>
            </div>
            <div class="card-content">
                <h3 style="overflow: hidden;"><b>Data Siswa</b></h3>
				<table class="table table-hover">
				    <tbody>
                        <tr>
                            <td><b>Email</b></td>
                            <td>: <?php echo $rows['email']; ?> </td>
                        </tr>
                        <tr>
                            <td><b>Nama</b></td>
                            <td>: <?php echo $rows['nama']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Nama Panggilan</b></td>
                            <td>: <?php echo $rows['nama_panggilan'];; ?></td>
                        </tr>
                        <tr>
                            <td><b>Status Pendaftaran</b></td>
                            <td>: <?php echo $rows['status_pendaftaran'];; ?></td>
                        </tr>
                        <tr>
                            <td><b>TTL</b></td>
                            <td>: <?php echo $rows['tempat_lahir'].", ".$rows['tanggal_lahir'];; ?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td>: <?php echo $rows['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Anak Ke -</b></td>
                            <td>: <?php echo $rows['anak_ke']." dari ".$rows['jumlah_saudara']?> bersaudara</td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td>: <?php echo $rows['alamat']; ?></td>
                        </tr>
				    </tbody>
				</table>

                <h3><b>Data Orangtua</b></h3>
                <table class="table table-hover">
				    <tbody>
                        <tr>
                            <td><b>Nama Ayah</b></td>
                            <td>: <?php echo $rows['nama_ayah']; ?></td>
                        </tr>
                        <tr>
                            <td><b>TTL</b></td>
                            <td>: <?php echo $rows['tempat_lahir_ayah'].", ".$rows['tanggal_lahir_ayah']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Pendidikan Terakhir</b></td>
                            <td>: <?php echo $rows['pendidikan_terakhir_ayah'];; ?></td>
                        </tr>
                        <tr>
                            <td><b>Pekerjaan</b></td>
                            <td>: <?php echo $rows['pekerjaan_ayah']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Agama</b></td>
                            <td>: <?php echo $rows['agama_ayah']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Nama Ibu</b></td>
                            <td>: <?php echo $rows['nama_ibu']; ?></td>
                        </tr>
                        <tr>
                            <td><b>TTL</b></td>
                            <td>: <?php echo $rows['tempat_lahir_ibu'].", ".$rows['tanggal_lahir_ibu']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Pendidikan Terakhir</b></td>
                            <td>: <?php echo $rows['pendidikan_terakhir_ibu']; ?></td>
                        </tr>
                                    
                        <tr>
                            <td><b>Pekerjaan</b></td>
                            <td>: <?php echo $rows['pekerjaan_ibu']; ?></td>
                        </tr>
                                    
                        <tr>
                            <td><b>Agama</b></td>
                            <td>: <?php echo $rows['agama_ibu']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Telp/HP</b></td>
                            <td>: <?php echo $rows['telp']; ?></td>
                        </tr>
				    </tbody>
				</table>

                <h3><b>Download</b></h3>
                <table class="table table-hover">
                    <tbody>
                        <ol>
                            <li>Akte Kelahiran <a href="<?php echo '../include/uploads/'.$rows['upload_akte'];  ?>" title="Download Akte Kelahiran">&rArr; Download Akte Kelahiran</a></li>
                            <li>Kartu Keluarga <a href="<?php echo '../include/uploads/'.$rows['upload_kartu_keluarga'];  ?>" title="Download Akte Kelahiran">&rArr; Download Kartu Keluarga</a></li>
                            <li>Rapor <a href="<?php echo '../include/uploads/'.$rows['upload_rapor'];  ?>" title="Download Akte Kelahiran">&rArr; Download Rapor</a></li>
                            <li>Piagam Prestasi <a href="<?php echo '../include/uploads/'.$rows['upload_piagam_prestasi'];  ?>" title="Download Akte Kelahiran">&rArr; Download Piagam Prestasi</a></li>
                        </ol>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);