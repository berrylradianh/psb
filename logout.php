<?php  

session_start();

session_destroy();

echo '<script>window.location = "login-admin-peserta.php"</script>';

?>