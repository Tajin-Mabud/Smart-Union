<?php
session_start();
include 'includes/db.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $police_id = mysqli_real_escape_string($connect, $_GET['id']);

    // Prepare the delete query
    $sql = "DELETE FROM village_police WHERE police_id = '$police_id'";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Police record deleted successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error deleting record: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }
} else {
    $_SESSION['status'] = "Invalid request!";
    $_SESSION['status_type'] = "error";
}

// Redirect back to the Secretary List page
header('Location: police.php'); // Adjust this to your actual police list page
exit;
?>
