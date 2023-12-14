<?php
include "connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addToCart"])) {
    // Retrieve user_id, food_id, and price from the form
    $user_id = $_POST["user_id"]; // Assuming user_id is available in your session or form
    $food_id = $_POST["food_id"];
    $price = $_POST["price"];

    // Perform the database insertion (use prepared statements for security)
    $stmt = $conn->prepare("INSERT INTO cart_items (user_id, food_id, price) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $user_id, $food_id, $price);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the menu page after adding to the cart
    header("Location: ../menu.php");
    exit();
}
