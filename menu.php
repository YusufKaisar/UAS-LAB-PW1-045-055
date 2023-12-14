<?php

include "includes/search.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu | COFFEESHOP</title>
  <style>
    .body {
      padding: 70px 0 0 0;
    }

    .main-color {
      background-color: lightpink;
    }

    .title {
      text-align: center;
      margin-bottom: 50px;
      margin-top: 40px;
    }

    .grid-custom {
      display: grid;
      grid-template-columns: 286px 286px 286px 286px;
      gap: 20px;
      margin: 0 auto;
    }

    .w-77 {
      width: 77%;
    }

    .w {
      width: 15px;
    }

    .mr {
      margin-right: 5px;
    }

    .button {
      width: max;
    }

    .remove-m {
      margin: 0;
    }

    .justify {
      text-align: justify;
    }

    .img-size {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .desc-size {
      height: 80px;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="body">

  <!-- navbar -->
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
            <a class="nav-link active text-warning" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="home.php">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-warning" aria-current="page" href="cart.php">Cart</a>
          </li>
      </div>
    </div>
  </nav>
  <h1 class="title ">menu <span class="text-warning">list</span></h1>

  <!-- searchbar -->
  <div class="w-100 d-flex justify-content-center mb-5">
    <form class="d-flex w-50" role="search" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="userInput" id="userInput" required>
      <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
    </form>
  </div>

  <!-- menu container -->
  <div class="grid-custom w-77 pb-5">
    <?php
    if ($myVariable == "") {
      $query = "SELECT * FROM foods";
    } else {
      // Use prepared statements to prevent SQL injection
      $query = "SELECT * FROM foods WHERE `name` LIKE ?";
    }

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
      // If searching, bind the parameter
      if ($myVariable != "") {
        $searchParam = "%$myVariable%";
        mysqli_stmt_bind_param($stmt, "s", $searchParam);
      }

      // Execute the query
      mysqli_stmt_execute($stmt);

      // Get the result set
      $result = mysqli_stmt_get_result($stmt);


      // Loop through the results and display them
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['food_id'];
        $name = $row['name'];
        $img = $row['img_url'];
        $price = $row['price'];
        $description = $row['description'];
        $rating = $row['rating'];

        echo "
          <div class='card' style='width: 18rem;'>
            <img src='$img' class='card-img-top object-fit-cover img-size' alt='...'>
            <div class='p-3 d-flex flex-column'>
              <div class='d-flex justify-content-between mb-3'>
                <h5 class='remove-m'>$name</h5>
                <div class='d-flex align-middle'>
                  <svg class='w mr' version='1.0' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 64 64' enable-background='new 0 0 64 64' xml:space='preserve' fill='#000000'>
                    <g id='SVGRepo_bgCarrier' stroke-width='0'></g>
                    <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g>
                    <g id='SVGRepo_iconCarrier'>
                      <path fill='#ffea00' d='M62.799,23.737c-0.47-1.399-1.681-2.419-3.139-2.642l-16.969-2.593L35.069,2.265 C34.419,0.881,33.03,0,31.504,0c-1.527,0-2.915,0.881-3.565,2.265l-7.623,16.238L3.347,21.096c-1.458,0.223-2.669,1.242-3.138,2.642 c-0.469,1.4-0.115,2.942,0.916,4l12.392,12.707l-2.935,17.977c-0.242,1.488,0.389,2.984,1.62,3.854 c1.23,0.87,2.854,0.958,4.177,0.228l15.126-8.365l15.126,8.365c0.597,0.33,1.254,0.492,1.908,0.492c0.796,0,1.592-0.242,2.269-0.72 c1.231-0.869,1.861-2.365,1.619-3.854l-2.935-17.977l12.393-12.707C62.914,26.68,63.268,25.138,62.799,23.737z'></path>
                    </g>
                  </svg>
                  <p class='remove-m fw-semibold'>$rating</p>
                </div>
              </div>
              <p class='remove-m text-secondary justify lh-1 mb-3 text-secondary desc-size'>$description</p>
              <p class='fw-semibold'>Rp. $price</p>
              <form method='post' action='includes/addToCart.php'>
                <input type='hidden' name='food_id' value='$id'>
                <input type='hidden' name='user_id' value='1'>
                <input type='hidden' name='price' value='$price'>
                <button class='btn btn-dark w-100' type='submit' name='addToCart'>Buy</button>
              </form>
            </div>
          </div>
        ";
      }

      // Close the statement
      mysqli_stmt_close($stmt);
    } else {
      // Handle the error if necessary
      echo "Error in preparing the statement: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </div>
  <!--footer-->

  <p class="text-center mt-3 small mt-5">&copy; 2023 Your Company. All rights reserved.</p>
  <div class="p-3 bg-black text-white text-center">Powered by <span class="text-warning">Yusuf & Adli.</span></div>
</body>

</html>