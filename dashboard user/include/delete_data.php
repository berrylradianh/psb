<div class="row">
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

                            if ($upload_akte != "" && $upload_kartu_keluarga != "") {

                                if ($daftar['status_pendaftaran'] == 1) {
                                    echo '<font color="#2ecc71">Akte Kelahiran dan Kartu Keluarga  <i class="fa fa-check"></i></font>';
                                }else if($daftar['status_pendaftaran'] >= 2){
                                    echo '<font color="#2ecc71">Akte Kelahiran dan Kartu Keluarga   <i class="fa fa-check"></i></font>';
                                }else{
                                  echo '<font color="#2ecc71">Akte Kelahiran dan Kartu Keluarga   <i class="fa fa-check"></i></font> <a href="index.php?page=9" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                                }

                                
                            }else{
                                echo 'Akte Kelahiran dan Kartu Keluarga &rArr; <a href="index.php?page=9" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                            }
                        
                        ?>
                    </li>
                    <li>
                        <?php 

                            if ($upload_rapor != "" || $upload_piagam_prestasi != "" ) {

                                if ($daftar['status_pendaftaran'] == 1) {
                                    echo '<font color="#2ecc71">Rapor dan Piagam Prestasi <i class="fa fa-check"></i></font>';
                                }else if($daftar['status_pendaftaran'] >= 2){
                                    echo '<font color="#2ecc71">Rapor dan Piagam Prestasi   <i class="fa fa-check"></i></font>';
                                }else{
                                    echo '<font color="#2ecc71">Rapor dan Piagam Prestasi   <i class="fa fa-check"></i></font> <a href="index.php?page=10" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                                }
                                
                            }else{
                                echo 'Rapor dan Piagam Prestasi &rArr; <a href="index.php?page=10" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga">DELETE</a>';
                            }
                        
                        ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>