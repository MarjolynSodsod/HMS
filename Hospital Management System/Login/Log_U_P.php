<?php
// Start the session
session_start();

// Hard-coded username and password
$correct_username = 'admin';
$correct_password = 'HMS123';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the posted username and password
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    // Check if the username and password are correct
    if ($username === $correct_username && $password === $correct_password) {
        // Set session variables
        $_SESSION['username'] = $username;

        // Redirect to the homepage
        header("Location: ../Dashboard.php");
        exit();
    } else {
        // Redirect back to the login form with an error message
        $error_message = urlencode("Invalid username or password!");
        header("Location: Login.php?error=" . $error_message);
        exit();
    }
} else {
    // If the form is not submitted, redirect to the login form
    header("Location: Login.php");
    exit();
}
?>