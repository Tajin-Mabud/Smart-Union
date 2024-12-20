<?php 
include 'includes/header.php'; 
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the ID is provided
if (isset($_GET['id'])) {
    $doctor_id = (int)$_GET['id'];

    // Delete the doctor from the database
    $delete_sql = "DELETE FROM doctor WHERE doctor_id = $doctor_id";

    if (mysqli_query($connect, $delete_sql)) {
        // Set success message and redirect
        $_SESSION['status'] = "Doctor deleted successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        // Set error message
        $_SESSION['status'] = "Error deleting doctor: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }
} else {
    $_SESSION['status'] = "No doctor ID provided!";
    $_SESSION['status_type'] = "error";
}

// Redirect back to the doctor list page
header('Location: doctor.php');
exit;
?>
