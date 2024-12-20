<?php
session_start();
include 'includes/db.php'; // Ensure you include your database connection file

if (isset($_GET['id'])) {
    $socib_id = mysqli_real_escape_string($connect, $_GET['id']);

    // Prepare the delete query
    $sql = "DELETE FROM socib WHERE isocib_id = '$socib_id'";

    // Execute the delete query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Socib record deleted successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error deleting record: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }
} else {
    $_SESSION['status'] = "Invalid request!";
    $_SESSION['status_type'] = "error";
}

// Redirect to the Socib list page
header('Location: secretary.php');
exit;
