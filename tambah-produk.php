<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$mysqli = new mysqli("localhost", "root", "", "login_web");
if ($mysqli->connect_errno) {
  die("Koneksi database gagal: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];
  $gambar = $_POST['gambar']; // bisa link gambar untuk sekarang

  $stmt = $mysqli->prepare("INSERT INTO produk (nama, harga, gambar, kategori) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("siss", $nama, $harga, $gambar, $kategori);

  if ($stmt->execute()) {
    header("Location: daftar-produk.php?status=sukses");
    exit;
  } else {
    $error = "Gagal menambahkan produk!";
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f1f1f1;
      padding: 30px;
    }
    form {
      background: #fff;
      max-width: 500px;
      margin: auto;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      background: #fbbd08;
      color: black;
      border: none;
      padding: 12px 20px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>

<form method="POST">
  <h2>Tambah Produk</h2>
  <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
  <label>Nama Produk:</label>
  <input type="text" name="nama" required>

  <label>Harga (dalam Rupiah):</label>
  <input type="number" name="harga" required>

  <label>URL Gambar:</label>
  <input type="text" name="gambar" placeholder="contoh: gambar.png" required>

  <label>Kategori:</label>
  <input type="text" name="kategori" placeholder="contoh: aplikasi" required>

  <button type="submit">Simpan Produk</button>
</form>

</body>
</html>
