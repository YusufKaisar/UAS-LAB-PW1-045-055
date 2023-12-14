<?php
// Connect to the database 
include "connect.php";
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID from the form
    $id_to_delete = $_POST["id"];

    // Prepare and execute the SQL query to delete the record
    $query = "DELETE FROM cart_items WHERE cart_items_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id_to_delete);

    if ($stmt->execute()) {
        header("Location: ../cart.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
