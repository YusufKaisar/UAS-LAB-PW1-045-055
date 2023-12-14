<?php
include "includes/connect.php";
$sum = 0;
$userID = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | COFFEESHOP</title>
    <style>
        .mt-main {
            margin-top: 120px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .mx-90 {
            margin: 0 80px;
        }

        .flex-container {
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
        }

        .img-item {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .w-60 {
            width: 60px;
        }

        .pe-custom {
            padding-right: 80px;
        }

        .pb-custom {
            padding-bottom: 150px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="position-relative pb-custom">
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
                        <a class="nav-link active text-warning" aria-current="page" href="#about">Tentang</a>
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


    <main class="mt-main mb-5">
        <h1 class="text-center mb-5 ">Ca<span class="text-warning">rt</span></h1>
        <div class="w-75 mx-auto p-5 shadow-lg rounded-4">

            <div class="fw-bold w-100 d-flex  align-items-center mb-4 pe-custom border-bottom border-2 border-black">
                <p class="w-60 me-5 text-center">Image</p>
                <p class="w-50 mx-5">Item Name</p>
                <p class="mx-90 mb-3">Price</p>
                <p class="ms-">Quantity</p>
            </div>
            <?php


            $query = "
                SELECT
                    cart_items_id,
                    foods.food_id AS foods_id,
                    foods.name AS foods_name,
                    foods.price AS foods_price,
                    foods.img_url AS foods_img
                FROM
                    cart_items
                JOIN
                    foods ON cart_items.food_id = foods.food_id
                WHERE
                    cart_items.user_id = $userID;
            ";

            $result = $conn->query($query);

            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $cartID = $row['cart_items_id'];
                        $price = $row['foods_price'];
                        $name = $row['foods_name'];
                        $img = $row['foods_img'];
                        $sum += $price;
                        echo "
                            <div class='w-100 d-flex justify-content-between align-items-center pb-4 mb-4  border-bottom border-black'>
                                <img src='$img' alt='' class='img-item me-4'>
                                <h3 class=' w-50 fs-6 me-4 mb-0'>$name</h3>
                                <span class='me-4'>Rp. $price</span>
                                <span class='me-4'>1</span>
                                <form method='post' action='includes/removeCart.php'>
                                    <input type='hidden' name='id' value='$cartID'>
                                    <button type='submit' class='btn btn-danger' onclick='confirmDelete()'>delete</button>
                                </form>
                            </div>
                        ";
                    }
                } else {
                    echo "you haven't add any item.";
                }
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
            ?>
        </div>
        <div class="w-75 mx-auto py-4 px-5 shadow-lg rounded mt-50 bg-dark text-white d-flex justify-content-between align-items-center">
            <div>
                <label for="cars">Select Payment Method:</label>
                <select id="cars" class="px-3 py-1 rounded-1">
                    <option value="volvo" selected>Mandiri</option>
                    <option value="saab">BRI</option>
                    <option value="vw">BTN</option>
                    <option value="audi">BSI</option>
                </select>
            </div>
            <div class="d-flex">
                <button class="me-5 bg-transparent text-info text-opacity-50 border-0" disabled>Input Voucher Code</button>
                <div class="d-flex align-items-center ms-2">
                    <?php
                    echo "
                        <span>Price : $sum </span>
                        <form method='post' action='includes/checkout.php'>
                            <input type='hidden' name='id' value='$userID'>
                            <button type='submit' class='btn btn-light ms-3' onclick='confirmDelete()'>Checkout</button>
                        </form>
                    "

                    ?>

                </div>
            </div>
        </div>
    </main>

    <!--footer-->

    <footer class=" position-absolute  bottom-0 start-0 end-0">
        <p class="text-center mt-3 small mt-5">&copy; 2023 Your Company. All rights reserved.</p>
        <div class="p-3 bg-black text-white text-center">Powered by <span class="text-warning">Yusuf & Adli.</span></div>
    </footer>

    <script>
        function confirmDelete() {
            var confirmation = window.confirm("Are you sure you want to delete this item?");
            if (!confirmation) {
                event.preventDefault(); // Prevent form submission
            }
        }
    </script>
</body>

</html>