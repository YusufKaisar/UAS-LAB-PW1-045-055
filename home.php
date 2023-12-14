<?php 
    session_start();
    include("php/config.php");

    // Check if the user is logged in
    $isLoggedIn = isset($_SESSION['valid']);

    if (isset($_POST['logout'])) {
        // If the logout button is clicked, destroy the session
        session_destroy();
        header("Location: login.php");
    }

    if (isset($_POST['login'])) {
        // If the login button is clicked, redirect to the login page
        header("Location: login.php");
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BALA COFFEE</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class>

<!--Navbar-->
<nav class="navbar navbar-expand-lg bg-black fixed-top">
  <div class="container">
    <a class="navbar-brand text-warning" href="#">KOPI BALA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="#menu">Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="menu.php">Explore</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="#about">Tentang</a>
        </li>
      </ul>

      <div class="right-links">
                        <!-- Check if the user is logged in -->
                        <?php if ($isLoggedIn) { ?>
                            <form method="post" class="text-warning text-decoration-none">
                                <button type="submit" name="logout" class="btn btn-warning">Logout</button>
                            </form>
                        <?php } else { ?>
                            <form method="post" class="text-warning text-decoration-none">
                                <button type="submit" name="login" class="btn btn-warning">Login</button>
                            </form>
                        <?php } ?>
                    </div>
    </div>
  </div>
</nav>

<!--Carousel-->
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/foto1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-warning">Selamat Datang di <span class="text-light">Bala Coffee!</span></h5>
        <p>Rasakan kenikmatan kopi terbaik di atmosfer yang nyaman dan hangat.</p>
      </div>
    </div>
    <div class="carousel-item"> 
      <img src="./images/foto2.jpg" class="d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-warning">Pilihan Kopi Berkualitas</h5>
        <p>Nikmati ragam kopi terbaik dari biji pilihan dengan rasa yang memukau.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/foto3.jpg" class="d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-warning">Tempat Nongkrong Terfavorit</h5>
        <p>Temukan suasana santai dan ramai teman di kafe kami. Bersantaplah dengan kenangan indah.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!--Menu-->
<section id="menu" class="home">
  <h1 class="text-1">Our Menu</h1>
  <p class="font-monospace text-warning">"Rasakan kreasi terbaru dari para barista kami, setiap sajian adalah karya seni."</p>
<div class="row row-cols-1 justify-content-center row-cols-md-3 g-6 mb-5">
  <div class="col mx-auto">
    <div class="card">
      <img src="./images/menukopi.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">COFFEE-BASED DRINKS</h5>
        <p class="card-text">Temukan kenikmatan kopi yang mendalam di setiap cangkir.</p>
      </div>
    </div>
  </div>
  <div class="col mx-auto">
    <div class="card">
      <img src="./images/menunonkopi.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">NON-COFFEE</h5>
        <p class="card-text">Kami juga memiliki menu non-coffee untuk kamu yang ingin pilihan lain.</p>
      </div>
    </div>
  </div>
  <div class="col mx-auto">
    <div class="card">
      <img src="./images/foodmenu.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">SNACK</h5>
        <p class="card-text">Jelajahi berbagai rasa dengan koleksi snack kami yang beragam.</p>
      </div>
    </div>
  </div>
</div>  
</section>

<!--About Us-->
  <section id="about" class="about bg-body-tertiary">
    <div class="container d-flex mb-5">
      <div class="about-img px-4">
        <img src="./images/aboutus2.jpg" class="rounded-4" width="300" height="450" alt="Tentang Kami">
      </div>
      <div class="about-content mt-5">
        <h2><span class="text-warning">Tentang</span> Kami</h2>
        <p align="justify">
        Bala Coffee lahir dari impian untuk menciptakan ruang yang menyambut dan menginspirasi, di mana 
        setiap pelanggan dapat menikmati kopi berkualitas tinggi sambil menciptakan kenangan berharga. 
        Dengan beragam kopi pilihan dan menu non-kopi yang lezat, kami berkomitmen untuk menjadi tempat 
        yang memenuhi keinginan semua pecinta kopi. 
        </p>
        <p align="justify">
        Di Bala Coffee, setiap biji kopi dipilih dengan teliti untuk memberikan pengalaman unik kepada 
        pelanggan kami. Keberlanjutan dan etika bisnis menjadi bagian integral dari nilai-nilai kami, 
        sehingga setiap langkah yang kami ambil mencerminkan dedikasi kami terhadap kualitas dan tanggung 
        jawab lingkungan. Bersama-sama, kami berusaha menciptakan atmosfer yang mengundang, di mana 
        kebersamaan dan semangat berkumpul dalam setiap tegukan. Selamat datang di Bala Coffee, di mana 
        kopi bukan hanya minuman, tetapi sebuah perjalanan rasa yang tak terlupakan.
        </p>
      </div>
    </div>
  </section>

<!--Contact-->
<div class="contact">
  <div class="p-3 mb-2 bg-warning text-dark">
    <p class="text-light text-center">GET UP CLOSE AND PERSONAL</p>
    <h1 class="text-light text-center">CONTACT US</h1>
  </div>

  <div class="d-flex justify-content-center gap-3">
  <div class="card border-0" style="width: 18rem;">
    <img src="./images/instagram2.png" class="card-img-top" alt="...">
    <div class="card-body text-center">
      <h5 class="card-title">@bala_coffee</h5>
      <p class="card-text">Connect to us through Instagram.</p>
      <a href="https://www.instagram.com" class="btn btn-outline-warning stretched-link">Go somewhere</a>
    </div>
  </div>
  <div class="card border-0" style="width: 18rem;">
    <img src="./images/email.png" class="card-img-top" alt="...">
    <div class="card-body text-center">
      <h5 class="card-title">balakopi1@gmail.com</h5>
      <p class="card-text">Connect to us through Email.</p>
      <a href="https://accounts.google.com/b/0/AddMailService" class="btn btn-outline-warning stretched-link">Go somewhere</a>
    </div>
  </div>
  </div>
</div>

<!--footer-->
<p class="text-center mt-3 small">&copy; 2023 Your Company. All rights reserved.</p>
<div class="p-3 bg-black text-white text-center">Powered by <span class="text-warning">Yusuf & Adli.</span></div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>