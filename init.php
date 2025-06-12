<?php
session_start();
require_once "db.php";
require_once "user.php";

// debug koneksi
if (!$link) {
    die("<p style='color:red;'>Koneksi database gagal.</p>");
}
?>
