<?php
include 'includes/header.php';

$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $bata_id = $_GET['id'];

    // SQL query to delete the record
    $sql = "DELETE FROM bata WHERE bata_id = '$bata_id'";

    if (mysqli_query($connect, $sql)) {
        // Set success message
        $_SESSION['status'] = "Allowance deleted successfully!";
        $_SESSION['status_type'] = 'success';
    } else {
        // Set error message
        $_SESSION['status'] = "Error deleting record: " . mysqli_error($connect);
        $_SESSION['status_type'] = 'error';
    }
} else {
    // If ID is not set, redirect back with an error
    $_SESSION['status'] = "No record selected to delete.";
    $_SESSION['status_type'] = 'error';
}

// Redirect to the list page after deletion
header('Location: bata.php');
exit();
?>
