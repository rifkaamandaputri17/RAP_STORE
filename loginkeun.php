<? 
     requiere "koneksi.php";
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Premium Store</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      background: #f9f9f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #fbbd08;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      background: #fbbd08;
      border: none;
      color: #000;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background: #f4b400;
    }

    .footer {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Premium Store</h2>
    <form id="loginForm">
      <label for="username">Username:</label>
      <input type="text" id="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" required>

      <label for="role">Masuk sebagai:</label>
      <select id="role">
        <option value="pembeli">Pembeli</option>
        <option value="pedagang">Pedagang</option>
      </select>

      <button type="submit">Login</button>
    </form>
    <div class="footer">
      &copy; 2025 Premium Store
    </div>
  </div>

  <script>
   document.getElementById("loginForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const username = document.getElementById("username").value;
  const role = document.getElementById("role").value;

  localStorage.setItem("user", JSON.stringify({ username, role }));

  if (role === "pembeli") {
    window.location.href = "web part2.html";
  } else if (role === "pedagang") {
    window.location.href = "dagang.html";
  }
});

  </script>
</body>
</html>
