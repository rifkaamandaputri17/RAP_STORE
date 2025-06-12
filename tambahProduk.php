<?php
session_start();

// Inisialisasi array produk jika belum ada
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

// Jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $harga = (int) ($_POST['harga'] ?? 0);
    $stok  = (int) ($_POST['stok'] ?? 0);

    if ($nama !== '' && $harga > 0 && $stok >= 0) {
        $_SESSION['produk'][] = [
            'nama' => htmlspecialchars($nama),
            'harga' => $harga,
            'stok' => $stok
        ];
        $pesan_sukses = "Produk berhasil ditambahkan.";
    } else {
        $pesan_error = "Data tidak valid. Pastikan semua field terisi dengan benar.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk - Premium Store</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f4f4;
      padding: 30px;
    }

    .form-box {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #fbbd08;
    }

    .form-input {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn {
      background: #fbbd08;
      color: #000;
      padding: 10px 20px;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn:hover {
      background: #f4b400;
    }

    .pesan {
      text-align: center;
      margin-bottom: 15px;
      font-weight: bold;
    }

    .pesan.sukses {
      color: green;
    }

    .pesan.error {
      color: red;
    }
  </style>
</head>
<body>

<div class="form-box">
  <h2>Tambah Produk Baru</h2>

  <?php if (isset($pesan_sukses)): ?>
    <p class="pesan sukses"><?= $pesan_sukses ?></p>
  <?php elseif (isset($pesan_error)): ?>
    <p class="pesan error"><?= $pesan_error ?></p>
  <?php endif; ?>

  <form method="POST">
    <div class="form-input">
      <label for="nama">Nama Produk</label>
      <input type="text" name="nama" id="nama" required>
    </div>
    <div class="form-input">
      <label for="harga">Harga (Rp)</label>
      <input type="number" name="harga" id="harga" min="1" required>
    </div>
    <div class="form-input">
      <label for="stok">Stok</label>
      <input type="number" name="stok" id="stok" min="0" required>
    </div>
    <button class="btn" type="submit">Simpan Produk</button>
  </form>
  <br>
  <a href="menu-utama.php" class="btn">Kembali ke Menu Utama</a>
</div>

</body>
</html>
