<?php
include 'includes/db.php'; // Adjust the path based on your database connection

// Check if the user_id is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // SQL to delete the user
    $sql = "DELETE FROM users WHERE user_id = '$user_id'";

    // Execute the query
    if (mysqli_query($connect, $sql)) {
        // On successful delete, set success status and redirect
        $_SESSION['status'] = "User deleted successfully!";
        $_SESSION['status_type'] = 'success';
    } else {
        // If deletion fails, set error status and redirect
        $_SESSION['status'] = "Failed to delete user. Please try again.";
        $_SESSION['status_type'] = 'error';
    }

    // Redirect back to the users list page
    header("Location: users.php");
    exit();
} else {
    // If user_id is not provided, redirect back
    $_SESSION['status'] = "No user ID provided!";
    $_SESSION['status_type'] = 'error';
    header("Location: users.php");
    exit();
}
