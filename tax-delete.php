<?php 
session_start();
include 'includes/db.php'; // Make sure this file contains your database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepare the DELETE statement
    $sql = "DELETE FROM tax WHERE tax_id = $id";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Allowance deleted successfully!";
        $_SESSION['status_type'] = 'success';
    } else {
        $_SESSION['status'] = "Error deleting record: " . mysqli_error($connect);
        $_SESSION['status_type'] = 'error';
    }
} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_type'] = 'error';
}

// Redirect back to the allowance list page
header("Location: tax.php");
exit();
