<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'login_web';

$link = mysqli_connect($host, $user, $password, $db) or die("Koneksi gagal: " . mysqli_connect_error());
?>
