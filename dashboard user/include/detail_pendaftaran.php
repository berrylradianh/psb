<?php  

include '../../auth.php';
include '../../koneksi/koneksi.php';

$id = $_GET["id"];

$query = "SELECT a.nama, a.id as id_daftar, b."
?>


<h2>Detail Pendaftaran</h2>

<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
<div class="card" style="margin-top: 50px">
<div class="card-header" data-background-color="blue">
<h4 class="title">Biodata Pendaftar</h4>
<p class="category">Periksan data anda dibawah, pastikan sudah benar</p>
</div>
<div class="card-content table-responsive">

<h3 style="overflow: hidden;"><b>Data Siswa</b></h3>
<table class="table table-hover">

    <tbody>
        <tr>
            <td><b>Email</b></td>
            <td>: <?php echo $akun['email']; ?> </td>
        </tr>
        <tr>
            <td><b>Nama</b></td>
            <td>: <?php echo $daftar['nama']; ?></td>
        </tr>
        <tr>
            <td><b>Nama Panggilan</b></td>
            <td>: <?php echo $daftar['nama_panggilan'];; ?></td>
        </tr>
        <tr>
            <td><b>TTL</b></td>
            <td>: <?php echo $daftar['tempat_lahir'].", ".$daftar['tanggal_lahir'];; ?></td>
        </tr>
        <tr>
            <td><b>Jenis Kelamin</b></td>
            <td>: <?php echo $daftar['jenis_kelamin']; ?></td>
        </tr>
        
        <tr>
            <td><b>Anak Ke -</b></td>
            <td>: <?php echo $daftar['anak_ke']." dari ".$daftar['jumlah_saudara']?> bersaudara</td>
        </tr>
        
        <tr>
            <td><b>Di Jakarta ikut</b></td>
            <td>: <?php echo $daftar['di_jakarta_ikut']; ?></td>
        </tr>
    </tbody>
</table>


<h3><b>Data Orangtua</b></h3>
<table class="table table-hover">

    <tbody>
        <tr>
            <td><b>Nama Ayah</b></td>
            <td>: <?php echo $daftar['nama_ayah']; ?></td>
        </tr>
        <tr>
            <td><b>TTL</b></td>
            <td>: <?php echo $daftar['tempat_lahir_ayah'].", ".$daftar['tanggal_lahir_ayah']; ?></td>
        </tr>
        <tr>
            <td><b>Pendidikan Terakhir</b></td>
            <td>: <?php echo $daftar['pendidikan_terakhir_ayah'];; ?></td>
        </tr>
        
        <tr>
            <td><b>Pekerjaan</b></td>
            <td>: <?php echo $daftar['pekerjaan_ayah']; ?></td>
        </tr>
        
        <tr>
            <td><b>Agama</b></td>
            <td>: <?php echo $daftar['agama_ayah']; ?></td>
        </tr>
        <tr>
            <td><b>Nama Ibu</b></td>
            <td>: <?php echo $daftar['nama_ibu']; ?></td>
        </tr>
        <tr>
            <td><b>TTL</b></td>
            <td>: <?php echo $daftar['tempat_lahir_ibu'].", ".$daftar['tanggal_lahir_ibu']; ?></td>
        </tr>
        <tr>
            <td><b>Pendidikan Terakhir</b></td>
            <td>: <?php echo $daftar['pendidikan_terakhir_ibu']; ?></td>
        </tr>
        
        <tr>
            <td><b>Pekerjaan</b></td>
            <td>: <?php echo $daftar['pekerjaan_ibu']; ?></td>
        </tr>
        
        <tr>
            <td><b>Agama</b></td>
            <td>: <?php echo $daftar['agama_ibu']; ?></td>
        </tr>
        <tr>
            <td><b>Telp/HP</b></td>
            <td>: <?php echo $daftar['telp']; ?></td>
        </tr>
    </tbody>
</table>

<h3><b>Download</b></h3>

<ol>
	<li>Akte Kelahiran <a href="<?php echo '../assets/uploads/'.$daftar['upload_akte'];  ?>" title="Download Akte Kelahiran"><i class="fa fa-download"></i></a></li>
	<li>Kartu Keluarga <a href="<?php echo '../assets/uploads/'.$daftar['upload_kartu_keluarga'];  ?>" title="Download Akte Kelahiran"><i class="fa fa-download"></i></a></li>
	<li>Foto Anak <a href="<?php echo '../assets/uploads/'.$daftar['foto_anak'];  ?>" title="Download Akte Kelahiran"><i class="fa fa-download"></i></a></li>
	<li>Foto Keluarga <a href="<?php echo '../assets/uploads/'.$daftar['foto_keluarga'];  ?>" title="Download Akte Kelahiran"><i class="fa fa-download"></i></a></li>
</ol>

<hr>
<h3>Lakukan Konfirmasi Pendaftaran?</h3>
<a href="include/proses_konfirmasi_pendaftaran.php?idd=<?php echo $idd; ?>" class="btn btn-primary pull-right"><i class="fa fa-check"></i>  Konfirmasi Pendaftaran</a>