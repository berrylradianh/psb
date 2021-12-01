<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Syarat Pendaftaran</h4>
                <p class="category">Isi Form pendaftaran dengan benar</p>
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
                


                <h3>Berikut adalah syarat pendaftaran siswa baru yang harus dipenuhi :</h3>
                <ol>
                    <li><font color="#2ecc71">Mengisi Formulir Pendaftaran <i class="fa fa-check"></font></i></li>
                    <li> 
                        <?php 

                            if ($upload_akte != "" && $upload_kartu_keluarga != "") {

                                if ($daftar['status_pendaftaran'] == 1) {
                                    echo '<font color="#2ecc71">Akte Kelahiran dan Kartu Keluarga <i class="fa fa-check"></i></font>';
                                }else if($daftar['status_pendaftaran'] >= 2){
                                    echo '<font color="#2ecc71">Akte Kelahiran dan Kartu Keluarga <i class="fa fa-check"></i></font>';
                                }else{
                                  echo '<font color="#2ecc71">Akte Kelahiran dan Kartu Keluarga <i class="fa fa-check"></i></font> <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-pencil"></i></a>';
                                }

                                
                            }else{
                                echo 'Akte Kelahiran dan Kartu Keluarga <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-upload"></i></a>';
                            }
                        
                        ?>
                    </li>
                    <li>
                        <?php 

                            if ($upload_rapor != "" || $upload_piagam_prestasi != "" ) {

                                if ($daftar['status_pendaftaran'] == 1) {
                                    echo '<font color="#2ecc71">Scan Rapor dan Piagam Prestasi<i class="fa fa-check"></i></font>';
                                }else if($daftar['status_pendaftaran'] >= 2){
                                    echo '<font color="#2ecc71">Scan rapor dan Piagam Prestasi<i class="fa fa-check"></i></font>';
                                }else{
                                    echo '<font color="#2ecc71">Scan rapor dan Piagam Prestasi<i class="fa fa-check"></i></font> <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-pencil"></i></a>';
                                }
                                
                            }else{
                                echo 'Scan rapor dan Piagam Prestasi <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-upload"></i></a>';
                            }
                        
                        ?>
                    </li>
                </ol>

                <h6><i><b>*Catatan : Tunggu konfirmasi admin paling lambat dua hari kerja untuk verifikasi file.</b></i></h6>
            </div>
        </div>
    </div>
</div>