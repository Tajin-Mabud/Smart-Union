<?php
session_start(); // Start the session

include 'includes/db.php'; // Ensure the database connection

if (isset($_GET['id'])) {
    $chairman_id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM chairman WHERE chairman_id = $chairman_id";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Chairman deleted successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error deleting chairman: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    header('Location: chairman.php');
    exit;
}
