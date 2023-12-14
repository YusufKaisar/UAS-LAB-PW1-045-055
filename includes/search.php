<?php
// Check if the session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection and other necessary includes
include "connect.php";

// Initialize the PHP variable
$myVariable = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Retrieve the user input
    $userInput = htmlspecialchars(trim($_POST["userInput"]));

    // Set the PHP variable value only if the form is submitted
    $myVariable = $userInput;

    // Store the value in the session
    $_SESSION['myVariable'] = $myVariable;

    // Redirect to the same page to avoid form resubmission on refresh
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit(); // Make sure to exit after header to prevent further execution
}

// Retrieve the value from the session
if (isset($_SESSION['myVariable'])) {
    $myVariable = $_SESSION['myVariable'];
}

// Clear the session value to reset it on page load
unset($_SESSION['myVariable']);
