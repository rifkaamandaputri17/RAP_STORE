<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

// Ambil data user dari session
$username = $_SESSION['user']['username'];

// Koneksi ke database login_web
$mysqli = new mysqli("localhost", "root", "", "login_web");
if ($mysqli->connect_errno) {
  die("Gagal koneksi database: " . $mysqli->connect_error);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu Utama - Premium Store</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #fbbd08;
    }

    .navbar {
      background: #fff;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .navbar h1 {
      margin: 0;
      color: #fbbd08;
      font-size: 24px;
    }

    .navbar .user-info {
      font-weight: bold;
      color: #333;
    }

    .navbar a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      margin-left: 20px;
    }

    .container {
      max-width: 900px;
      margin: 50px auto;
      padding: 20px;
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .menu-card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.2s ease;
    }

    .menu-card:hover {
      transform: translateY(-5px);
    }

    .menu-card h3 {
      margin-bottom: 10px;
      color: #333;
    }

    .menu-card p {
      color: #666;
      font-size: 14px;
    }

    .menu-card a {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background: #fbbd08;
      color: #000;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .menu-card a:hover {
      background: #f4b400;
    }
  </style>
</head>
<body>

<div class="navbar">
  <h1>Premium Store</h1>
  <div class="user-info">
    👤 <?= htmlspecialchars($username); ?>
    <a href="tambah-produk.php">Tambah Produk</a>
    <a href="logout.php" onclick="return confirm('Keluar dari akun?')">Keluar</a>
  </div>
</div>

<div class="container">
  <div class="menu-grid">
    <div class="menu-card">
      <h3>Tambah Produk</h3>
      <p>Masukkan produk baru ke dalam toko Anda.</p>
      <a href="tambah-produk.php">Tambahkan Produk</a>
    </div>
    <div class="menu-card">
      <h3>Daftar Produk</h3>
      <p>Lihat dan kelola semua produk yang sudah Anda tambahkan.</p>
      <a href="daftar-produk.php">Lihat Produk</a>
    </div>
    <div class="menu-card">
      <h3>Pesanan</h3>
      <p>Kelola pesanan dari pelanggan Anda.</p>
      <a href="pesanan.php">Lihat Pesanan</a>
    </div>
    <div class="menu-card">
      <h3>Profil Toko</h3>
      <p>Perbarui informasi toko Anda.</p>
      <a href="profil-toko.php">Edit Profil</a>
    </div>
  </div>
</div>

</body>
</html>
