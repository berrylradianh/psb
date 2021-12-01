<h2>Peserta Pendaftaran</h2>

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> Peserta pendaftaran.
    </div>";
}

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Peserta Pendaftaran</h4>
                <p class="category">Berikut adalah peserta PPDB Online</p>
            </div>
            <div class="card-content">
                
                <h3 style="overflow: hidden;"><b>Data Siswa</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><center><b>No</b></center></td>
							<td><center><b>Nama Pendaftar</b></center></td>
							<td><center><b>Email</b></center></td>
							<td><center><b>Alamat</b></center></td>
							<td><center><b>Aksi</b></center></td>
						</tr>
					</thead>
				    <tbody>
				    	<?php  
				    		$query 	= "SELECT *
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
										<td><center><?php echo $rows['alamat']; ?></center></td>
										<td><center>
											<a style="background-color:#0da6b9;" class="btn btn-warning btn-sm" 
											href='include/detail_pendaftaran.php?id_user=<?=$rows['id_user']?>'>Lihat</a>
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