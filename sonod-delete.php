<?php
session_start(); // Start the session

include 'includes/db.php'; // Make sure to include your database connection file

if (isset($_GET['id'])) {
    $sonod_id = $_GET['id'];

    // Prepare the DELETE statement
    $sql = "DELETE FROM sonod WHERE sonod_id = ?";
    
    // Using a prepared statement to avoid SQL injection
    if ($stmt = mysqli_prepare($connect, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $sonod_id); // Bind the parameter

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Set success message
            $_SESSION['status'] = "Record deleted successfully.";
            $_SESSION['status_type'] = "success";
        } else {
            // Set error message
            $_SESSION['status'] = "Error deleting record: " . mysqli_error($connect);
            $_SESSION['status_type'] = "error";
        }

        mysqli_stmt_close($stmt); // Close the prepared statement
    } else {
        // Handle error in preparing the statement
        $_SESSION['status'] = "Error preparing statement: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }
} else {
    // If no ID is passed, set an error message
    $_SESSION['status'] = "No ID provided.";
    $_SESSION['status_type'] = "error";
    
}
header("Location: sonod.php"); // Replace with the page you want to redirect to

// Redirect back to the previous page (you can change this to the desired location)
exit();
?>
