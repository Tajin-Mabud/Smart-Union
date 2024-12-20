<?php
include 'includes/header.php';

$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the `id` parameter exists in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $dormo_id = mysqli_real_escape_string($connect, $_GET['id']);

    // Check if the record exists in the database
    $check_sql = "SELECT * FROM dormo WHERE dormo_id = '$dormo_id'";
    $result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        // If record exists, proceed with the deletion
        $delete_sql = "DELETE FROM dormo WHERE dormo_id = '$dormo_id'";
        if (mysqli_query($connect, $delete_sql)) {
            // Success: Set session message for successful deletion
            $_SESSION['status'] = 'Religion deleted successfully!';
            $_SESSION['status_type'] = 'success';
        } else {
            // Error during deletion
            $_SESSION['status'] = 'Failed to delete religion.';
            $_SESSION['status_type'] = 'error';
        }
    } else {
        // Religion not found
        $_SESSION['status'] = 'Religion not found.';
        $_SESSION['status_type'] = 'error';
    }
} else {
    // Invalid ID or missing ID in URL
    $_SESSION['status'] = 'Invalid religion ID.';
    $_SESSION['status_type'] = 'error';
}

// Redirect back to the religion list page after deletion
header('Location: religion.php');
exit();

?>
