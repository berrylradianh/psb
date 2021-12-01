<h2>Konfirmasi Pendaftaran</h2>

<?php  
error_reporting(0);
 
$db_name 	= "psb";
$host		= "localhost";
$username	= "root";
$password	= "";

$conn 		= mysqli_connect($host,$username,$password,$db_name) or die("Database connection error!");
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Konfirmasi Pendaftaran</h4>
                <p class="category">Lakukan konfirmasi pendaftaran</p>
            </div>
            <div class="card-content">
                
                <h3 style="overflow: hidden;"><b>Data Siswa</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><center><b>No</b></center></td>
							<td><center><b>Nama Pendaftar</b></center></td>
							<td><center><b>Email</b></center></td>
							<td><center><b>Status Pendaftaran</b></center></td>
							<td><center><b>Aksi</b></center></td>
						</tr>
					</thead>
				    <tbody>
				    	<?php  
				    		$query 	= "SELECT a.nama, a.id as id_daftar, b.id as id_akun,b.email,c.* 
				    				FROM pendaftaran a, akun b, detail_pendaftaran c 
						    		WHERE a.id=b.id_user 
						    		AND b.role_user=1 
						    		AND c.id_user = a.id
                    				AND a.upload_akte != '' 
                    				AND a.upload_kartu_keluarga != '' 
                    				AND a.upload_rapor != ''";

				    		$exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
				    			$total	= mysqli_num_rows($exec);
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				    $status = $rows['status_pendaftaran'];

				    			
				    	?>
		
								
									<tr>
										<td><center><?php echo ++$no; ?></center></td>
										<td><center><?php echo $rows['nama']; ?></center></td>
										<td><center><?php echo $rows['email']; ?></center></td>
										<td><center><?php 
										$status == 0 ? 
										print("<font color='#e74c3c'>Belum dikonfirmasi</font>") : 
										print("<font color='##2ecc71'>Sudah dikonfirmasi</font>"); 
										?></center></td>
										<td><center>
											<!-- <a href="" class="btn btn-primary btn-sm">Konfirmasi</a> -->
											<a style="background-color:green;" href='include/proses_konfirmasi_diterima.php?id_user=<?php echo $rows['id_user']?>' 
											class="btn btn-warning btn-sm">Diterima</a>
											<a style="background-color:orange;" href='include/proses_konfirmasi_cadangan.php?id_user=<?php echo $rows['id_user']?>' 
											class="btn btn-warning btn-sm">Cadangan</a>
											<a style="background-color:red;" href='include/proses_konfirmasi_gagal.php?id_user=<?php echo $rows['id_user']?>' 
											class="btn btn-warning btn-sm">Tidak Diterima</a>
											 </center>
										</td>
									</tr>

				    	<?php
				    				}
				    			}else{
				    				echo "<td colspan='5' align='center'><h3><b>Belum ada siswa daftar</b></h3></td>";
				    			}
				    		}else{
				    			echo mysqli_error($conn);
				    		}
				    	?>
				        
				    </tbody>
				</table>

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);

?>