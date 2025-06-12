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

$result = $mysqli->query("SELECT * FROM pesanan ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pesanan</title>
  <style>
    body { font-family: 'Segoe UI', sans-serif; padding: 30px; background: #f9f9f9; }
    table { width: 100%; border-collapse: collapse; background: #fff; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    th { background: #fbbd08; }
    .back { margin-bottom: 20px; display: inline-block; background: #fbbd08; padding: 8px 15px; color: #000; text-decoration: none; border-radius: 5px; font-weight: bold; }
  </style>
</head>
<body>

<a href="menu.php" class="back">← Kembali ke Menu</a>
<h2>Data Pesanan</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Nama Pelanggan</th>
    <th>Produk</th>
    <th>Jumlah</th>
    <th>Total</th>
    <th>Tanggal</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
      <td><?= htmlspecialchars($row['produk']); ?></td>
      <td><?= $row['jumlah']; ?></td>
      <td>Rp <?= number_format($row['total'], 0, ',', '.'); ?></td>
      <td><?= $row['tanggal']; ?></td>
    </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
