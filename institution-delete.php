<?php
session_start();
include 'includes/db.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $institution_id = mysqli_real_escape_string($connect, $_GET['id']);

    // Prepare the delete query
    $sql = "DELETE FROM institution WHERE institution_id = '$institution_id'";

    // Execute the delete query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Institution deleted successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error deleting institution: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    // Redirect back to the institution list page
    header("Location: institution.php");
    exit;
} else {
    // Redirect if no ID is provided
    $_SESSION['status'] = "Invalid request. No ID provided.";
    $_SESSION['status_type'] = "error";
    header("Location: institution.php");
    exit;
}
?>
