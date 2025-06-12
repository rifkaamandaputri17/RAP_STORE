<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$mysqli = new mysqli("localhost", "root", "", "login_web");
if ($mysqli->connect_errno) {
  die("Gagal koneksi database: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'], $_POST['jumlah'], $_POST['harga'])) {
  $user_id = $_SESSION['user']['id'];
  $nama = $_POST['nama'];
  $jumlah = (int)$_POST['jumlah'];
  $harga = (int)$_POST['harga'];

  // Simpan ke tabel keranjang
  $stmt = $mysqli->prepare("INSERT INTO keranjang (user_id, nama_produk, jumlah, harga) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isii", $user_id, $nama, $jumlah, $harga);
  if ($stmt->execute()) {
    header("Location: fraktur.php"); // Arahkan ke halaman keranjang/fraktur
    exit;
  } else {
    echo "Gagal menambahkan ke keranjang";
  }
}
?>
