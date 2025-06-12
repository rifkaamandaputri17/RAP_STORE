<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "login_web");

    if ($mysqli->connect_errno) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $check = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);
        if ($stmt->execute()) {
            $_SESSION['user'] = [
                'id' => $stmt->insert_id,
                'username' => $username,
                'role' => 0
            ];
            header("Location: webpart2.php");
            exit();
        } else {
            $error = "Registrasi gagal!";
        }
    }

    $check->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            font-family: 'Jost', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 350px;
            text-align: center;
        }
        .register-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .register-container input {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .register-container button {
            background-color: #0072ff;
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .register-container button:hover {
            background-color: #005ec4;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
        .register-container a {
            color: #0072ff;
            text-decoration: none;
        }
        .register-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Daftar Akun</h2>
    <?php if (isset($error)) echo "<div class='error-message'>$error</div>"; ?>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>

</body>
</html>
