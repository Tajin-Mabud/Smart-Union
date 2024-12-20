<?php
// Include the database connection file
include 'includes/db.php'; // Adjust the path based on your setup

// Check if `id` is passed in the URL
if (isset($_GET['id'])) {
    $blood_id = $_GET['id'];

    // Prepare the DELETE SQL query
    $sql = "DELETE FROM blood WHERE blood_id = '$blood_id'";

    // Execute the query and check for success
    if (mysqli_query($connect, $sql)) {
        // If successful, set a success message in the session and redirect back to the blood listing page
        $_SESSION['status'] = "Donor deleted successfully!";
        $_SESSION['status_type'] = 'success';
    } else {
        // If failed, set an error message in the session
        $_SESSION['status'] = "Failed to delete donor. Please try again.";
        $_SESSION['status_type'] = 'error';
    }

    // Redirect to the blood listing page (or wherever appropriate)
    header("Location: blood.php");
    exit();
} else {
    // Redirect to the blood listing page if no `id` is provided
    $_SESSION['status'] = "No donor selected to delete.";
    $_SESSION['status_type'] = 'error';
    header("Location: blood.php");
    exit();
}
?>
