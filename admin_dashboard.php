<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION['admin']; ?>!</h1>
    <p>Ini adalah halaman dashboard admin.</p>

    <a href="admin_logout.php">Logout</a>
</body>
</html>
