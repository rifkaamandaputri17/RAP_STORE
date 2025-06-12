<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$mysqli = new mysqli("localhost", "root", "", "login_web");
if ($mysqli->connect_errno) {
  die("Koneksi gagal: " . $mysqli->connect_error);
}

$id_user = $_SESSION['user']['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $new_username = $_POST['username'];
  $new_password = $_POST['password'];

  if (!empty($new_password)) {
    $hashed = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssi", $new_username, $hashed, $id_user);
  } else {
    $stmt = $mysqli->prepare("UPDATE users SET username = ? WHERE id = ?");
    $stmt->bind_param("si", $new_username, $id_user);
  }

  if ($stmt->execute()) {
    $_SESSION['user']['username'] = $new_username;
    $success = "Profil berhasil diperbarui!";
  } else {
    $error = "Gagal memperbarui profil.";
  }

  $stmt->close();
}

// Ambil data user
$data = $mysqli->query("SELECT username FROM users WHERE id = $id_user")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Toko</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f4f4;
      padding: 30px;
    }
    form {
      max-width: 500px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    button {
      background: #fbbd08;
      border: none;
      padding: 10px 20px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px;
    }
    .msg { text-align: center; margin-bottom: 10px; font-weight: bold; }
    .success { color: green; }
    .error { color: red; }
    .back { display: block; margin-bottom: 15px; text-align: center; }
  </style>
</head>
<body>

<a href="menu.php" class="back">← Kembali ke Menu</a>
<form method="POST">
  <h2>Edit Profil Toko</h2>
  <?php if (isset($success)) echo "<div class='msg success'>$success</div>"; ?>
  <?php if (isset($error)) echo "<div class='msg error'>$error</div>"; ?>

  <label>Username:</label>
  <input type="text" name="username" value="<?= htmlspecialchars($data['username']); ?>" required>

  <label>Password Baru (opsional):</label>
  <input type="password" name="password" placeholder="Kosongkan jika tidak diubah">

  <button type="submit">Simpan Perubahan</button>
</form>

</body>
</html>
