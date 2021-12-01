<?php  

include '../koneksi/koneksi.php';
            $query  = "DELETE FROM pendaftaran WHERE id = $id+1";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
             echo "<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Berhasil!</strong> Delete Akte(PDF, JPEG, PNG).
            </div>";   
            }

            else {
                echo "<div class='alert alert-danger alert-dismissable'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Gagal!</strong> Delete Akte(PDF, JPEG, PNG).
                </div>";

            }
            echo'<script> window.location="../dashboard user/index.php?page=9"; </script> ';
?>