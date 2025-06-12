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

$result = $mysqli->query("SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Produk</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #fff8dc;
      padding: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #fbbd08;
    }

    img {
      height: 50px;
    }

    .status {
      color: green;
      font-weight: bold;
    }

    .back {
      margin-bottom: 15px;
      display: inline-block;
      text-decoration: none;
      background: #fbbd08;
      color: black;
      padding: 8px 15px;
      border-radius: 5px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<a href="menu.php" class="back">← Kembali ke Menu</a>
<h2>Daftar Produk</h2>

<?php if (isset($_GET['status']) && $_GET['status'] == 'sukses') echo "<p class='status'>Produk berhasil ditambahkan!</p>"; ?>

<table>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Gambar</th>
    <th>Kategori</th>
  </tr>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= htmlspecialchars($row['nama']); ?></td>
      <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
      <td><img src="<?= htmlspecialchars($row['gambar']); ?>" alt="gambar"></td>
      <td><?= htmlspecialchars($row['kategori']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
