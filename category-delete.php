<?php
include 'includes/header.php';

$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the category ID is provided in the URL
if (isset($_GET['id'])) {
    $category_id = mysqli_real_escape_string($connect, $_GET['id']);

    // Delete the category
    $sql = "DELETE FROM doctor_category WHERE category_id = '$category_id'";

    if (mysqli_query($connect, $sql)) {
        // Set success message and redirect
        $_SESSION['status'] = "Category deleted successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        // Set error message if deletion fails
        $_SESSION['status'] = "Error deleting category!";
        $_SESSION['status_type'] = "error";
    }
} else {
    // Set error message if no category ID is found
    $_SESSION['status'] = "Invalid category ID!";
    $_SESSION['status_type'] = "error";
}

// Redirect back to the category list page
header('Location: category.php');
exit();
?>
