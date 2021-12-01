<?php  

include '../auth.php';
include '../koneksi/koneksi.php';

$role = "";

$id 	= $_SESSION['auth'];


if ($_SESSION['role_user'] == 0) {
	$role = "Admin";
    $query      = "SELECT * FROM akun WHERE id = $id";

    $exec       = mysqli_query($conn, $query);

    if ($exec) {
    
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }

}else{
	$role = "User";
    $query      = "SELECT a.*,b.* FROM pendaftaran a, akun b WHERE a.id = $id AND b.id_user=$id";

    $exec       = mysqli_query($conn, $query);


    if ($exec) {
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }
}




$getPage = $_GET['page'];

switch ($getPage) {
	case 1:
		$page 				= "include/home.php";
		$_SESSION['active']	= "1";
		break;
	case 7:
		$page 				= "include/konfirmasi_pendaftaran.php";
		$_SESSION['active']	= "4";
		break;
    case 9:
        $page               = "include/peserta_pendaftaran.php";
        $ida                = $_GET['ida'];
        $idd                = $_GET['idd'];
        $_SESSION['active'] = "5";
        break;
	default:
		$page 	= "include/home.php";
		$_SESSION['active']	= "1";
		break;
}

?>


<!doctype html>
<html lang="en">
	
<head>
    
    <title>Dashboard <?php echo $role; ?></title>
	

    <?php  
    	include "include/libs.php";
    ?>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    Selamat datang <?php $role == "Admin" ? print($nama_admin) : print($nama_panggilan); ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php $_SESSION['active'] == 1 ? print("active") : print("") ?>">
                        <a href="index.php?page=1">
                            <i class="material-icons">dashboard</i>
                            <p>Home</p>
                        </a>
                    </li>

                    <?php  
					if ($role == "Admin") {
					?>
                    <li class="<?php $_SESSION['active'] == 4 ? print("active") : print("") ?>">
                        <a href="index.php?page=7">
                            <i class="material-icons">content_paste</i>
                            <p>Konfirmasi Pendaftaran </p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 5 ? print("active") : print("") ?>">
                        <a href="index.php?page=9">
                            <i class="material-icons">supervisor_account</i>
                            <p>Peserta Pendaftaran</p>
                        </a>
                    </li>
					<?php
					}
					?>               
                    
                    <li>
                        <a href="../logout.php">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Logout</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                   
                   <?php  

                   include $page;

                   ?>
                        
                </div>
            </div>
            
        </div>
    </div>
</body>

<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/chartist.min.js"></script>
<script src="../assets/js/arrive.min.js"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/js/bootstrap-notify.js"></script>
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="../assets/js/demo.js"></script>

<script>
    $(document).ready(function(){
        $("#cetak").click(function(){
            window.print();
        });
    });
</script>

</html>