<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "login_web");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RAP STORE - TOKO PREMIUM</title>

  <!--CSS LINK-->
  <link rel="stylesheet" href="css part2.css"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

<header>
  <a href="#" class="logo"> <img src="logo web.png" alt=""></a>

  <ul class="navmenu">
    <li><a href="web part2.html">HOME</a></li>
    <li><a href="SHOP.HTML">SHOP</a></li>
  </ul>

  <div class="nav-icon" style="position: relative; display: flex; align-items: center; gap: 10px;">
    <i class='bx bx-search' id="searchToggle" style="cursor: pointer;"></i>
    <input type="text" id="searchInput" placeholder="Cari produk..." 
           style="display:none; position:absolute; top:60px; right:100px; padding:8px; width:250px; z-index:1000; border:1px solid #ccc; border-radius:4px;">

    <!-- Menampilkan username -->
    <span style="color: white; font-weight: bold;">
      <?php echo htmlspecialchars($_SESSION['user']['username']); ?>
    </span>

    <a href="menu.php"><i class='bx bx-store'></i></a>
    <a href="fraktur.php"><i class='bx bx-cart'></i></a>
    <a href="fraktur_web.php"><i class='bx bx-credit-card-alt'></i></a>

    <!-- Tombol logout -->
    <a href="logout.php" title="Logout"><i class='bx bx-log-out'></i></a>

    <div class="bx bx-menu" id="menu-icon"></div>
  </div>
</header>

<section class="main-home">
  <div class="main-text">
    <h5>APLIKASI PREMIUM</h5>
    <h1>Menjual aplikasi premium <br>harga pelajar</h1>
    <p>APLIKASI PREMIUM COCOK UNTUK KAUM MENDANG MENDING</p>
    <a href="SHOP.HTML" class="main-btn">Shop Now <i class='bx bx-right-arrow-alt'></i></a>
  </div>
  <div class="down-arrow">
    <a href="#trending" class="down"><i class='bx bx-down-arrow-alt'></i></a>
  </div>
</section>

<!-- Trending Products -->
<section class="trending-products" id="trending">
  <div class="center-text">
    <h2>Our Trending <span>Product</span></h2>
  </div>

  <div class="products">

  <!-- Produk Spotify -->
  <div class="row product-item">
    <img src="spotify.webp" height="200" width="200" alt="">
    <div class="product-text"><h5>SALE</h5></div>
    <div class="heart-icon"><i class='bx bx-heart'></i></div>
    <div class="ratting">
      <i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bxs-star-half'></i>
    </div>
    <div class="price">
      <h4>SPOTIFY PREMIUM 1 BULAN</h4>
      <p>Rp 50.000</p>
      <form method="POST" action="keranjang.php">
        <input type="hidden" name="nama" value="SPOTIFY PREMIUM 1 BULAN">
        <input type="hidden" name="jumlah" value="1">
        <input type="hidden" name="harga" value="50000">
        <button type="submit" class="btn-cart">+ Keranjang</button>
      </form>
    </div>
  </div>

  <!-- Netflix -->
  <div class="row product-item">
    <img src="Netflix-Symbol.png" height="200" width="200" alt="">
    <div class="product-text"><h5>SALE</h5></div>
    <div class="heart-icon"><i class='bx bx-heart'></i></div>
    <div class="ratting">
      <i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bxs-star-half'></i>
    </div>
    <div class="price">
      <h4>NETFLIX PREMIUM SHARING 1 BULAN</h4>
      <p>Rp 38.000</p>
      <form method="POST" action="keranjang.php">
        <input type="hidden" name="nama" value="NETFLIX PREMIUM SHARING 1 BULAN">
        <input type="hidden" name="jumlah" value="1">
        <input type="hidden" name="harga" value="38000">
        <button type="submit" class="btn-cart">+ Keranjang</button>
      </form>
    </div>
  </div>

  <!-- Canva -->
  <div class="row product-item">
    <img src="CANVA.jpg" height="200" width="200" alt="">
    <div class="product-text"><h5>SALE</h5></div>
    <div class="heart-icon"><i class='bx bx-heart'></i></div>
    <div class="ratting">
      <i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bxs-star-half'></i>
    </div>
    <div class="price">
      <h4>CANVA PREMIUM 1 BULAN</h4>
      <p>Rp 3.000</p>
      <form method="POST" action="keranjang.php">
        <input type="hidden" name="nama" value="CANVA PREMIUM 1 BULAN">
        <input type="hidden" name="jumlah" value="1">
        <input type="hidden" name="harga" value="3000">
        <button type="submit" class="btn-cart">+ Keranjang</button>
      </form>
    </div>
  </div>

  <!-- Disney -->
  <div class="row product-item">
    <img src="DISNEY.jpg" height="200" width="200" alt="">
    <div class="product-text"><h5>SALE</h5></div>
    <div class="heart-icon"><i class='bx bx-heart'></i></div>
    <div class="ratting">
      <i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bxs-star-half'></i>
    </div>
    <div class="price">
      <h4>DISNEY HOTSTAR PREMIUM SHARING 1 BULAN</h4>
      <p>Rp 35.000</p>
      <form method="POST" action="keranjang.php">
        <input type="hidden" name="nama" value="DISNEY HOTSTAR PREMIUM SHARING 1 BULAN">
        <input type="hidden" name="jumlah" value="1">
        <input type="hidden" name="harga" value="35000">
        <button type="submit" class="btn-cart">+ Keranjang</button>
      </form>
    </div>
  </div>

  <!-- Capcut -->
  <div class="row product-item">
    <img src="CAPCUT.png" height="200" width="200" alt="">
    <div class="product-text"><h5>SALE</h5></div>
    <div class="heart-icon"><i class='bx bx-heart'></i></div>
    <div class="ratting">
      <i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bxs-star-half'></i>
    </div>
    <div class="price">
      <h4>CAPCUT PREMIUM 1 BULAN</h4>
      <p>Rp 7.000</p>
      <form method="POST" action="keranjang.php">
        <input type="hidden" name="nama" value="CAPCUT PREMIUM 1 BULAN">
        <input type="hidden" name="jumlah" value="1">
        <input type="hidden" name="harga" value="7000">
        <button type="submit" class="btn-cart">+ Keranjang</button>
      </form>
    </div>
  </div>

  <!-- YouTube -->
  <div class="row product-item">
    <img src="yt.png" height="200" width="200" alt="">
    <div class="product-text"><h5>SALE</h5></div>
    <div class="heart-icon"><i class='bx bx-heart'></i></div>
    <div class="ratting">
      <i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bx-star'></i><i class='bx bxs-star-half'></i>
    </div>
    <div class="price">
      <h4>YOUTUBE PREMIUM 1 BULAN</h4>
      <p>Rp 6.000</p>
      <form method="POST" action="keranjang.php">
        <input type="hidden" name="nama" value="YOUTUBE PREMIUM 1 BULAN">
        <input type="hidden" name="jumlah" value="1">
        <input type="hidden" name="harga" value="6000">
        <button type="submit" class="btn-cart">+ Keranjang</button>
      </form>
    </div>
  </div>

</div>

</section>

<!-- Client Reviews -->
<section class="client-reviews">
  <div class="reviews">
    <h3>Client Reviews</h3>
    <img src="jeno.jpg" alt="">
    <p>Tempat terpercaya untuk membeli aplikasi premium dengan harga pelajar.</p>
    <h2>LEE JENO</h2>
    <p>MEMBER NCT DREAM</p>
  </div>
</section>

<!-- Update News -->
<section class="update-news">
  <div class="up-center-text">
    <h2>New Updates</h2>
  </div>
  <div class="update-cart"></div>
  <div class="cart"></div>
</section>

<!-- Contact -->
<section class="contact">
  <div class="contact-info">
    <div class="first-info">
      <img src="logo web.png" alt="">
      <p>UNIVERSITAS NEGERI PADANG <br> AIR TAWAR PADANG</p>
      <p>083801968880</p>
      <p>rifkaamandaputri2005@gmail.com</p>
      <div class="social-icon"> 
        <a href="https://www.instagram.com/rifka.amnd_" target="_blank"><i class='bx bxl-instagram'></i></a>
      </div>
    </div>

    <div class="second-info">
      <h4>SUPPORT</h4>
      <p><a href="https://wa.me/6283801968880" target="_blank">Contact Us</a></p> 
      <p>ABOUT PAGE</p>
      <p>SHOPPING AND RETURNS</p>
      <p>PRIVACY</p>
    </div>

    <div class="third-info">
      <h4>SHOP</h4>
      <p>APLIKASI PREMIUM</p>
      <p>TOP UP GAME</p>
      <p>PULSA & TOKEN</p>
      <p>DISCOUNT</p>
    </div>

    <div class="fourth-info">
      <h4>COMPANY</h4>
      <p>ABOUT</p>
      <p>BLOG</p>
      <p>AFFILIATE</p>
    </div>
  </div>
</section>

<div class="end-text">
  <p>Copyright @2025. All Right Reserved. Design by Rifka Amanda Putri 24343046</p>
</div>

<script>
  const searchToggle = document.getElementById('searchToggle');
  const searchInput = document.getElementById('searchInput');

  searchToggle.addEventListener('click', () => {
    if (searchInput.style.display === 'none') {
      searchInput.style.display = 'block';
      searchInput.focus();
    } else {
      searchInput.style.display = 'none';
    }
  });

  searchInput.addEventListener("keyup", function () {
    let filter = this.value.toLowerCase();
    let items = document.getElementsByClassName("product-item");

    for (let i = 0; i < items.length; i++) {
      let text = items[i].textContent.toLowerCase();
      items[i].style.display = text.includes(filter) ? "" : "none";
    }
  });
</script>

<script src="java.js"></script>
</body>
</html>
