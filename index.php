<?php

require_once "init.php";

if ( !isset($_SESSION['user']) ) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('location: login.php');
}
require_once "header.php";

?>  

<h1>HALAMAN PROFIL <?php echo $_SESSION['user'] ?></h1>

<br>
<?php if(cek_status($_SESSION['user']) == 1) {?>
<div>HALO ADMIN</div>
<?php }?>


<?php require_once "footer.php"; ?>
