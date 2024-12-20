<?php 
include 'includes/header.php'; 

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $member_id = $_GET['id'];

    // Validate the member ID (you might want to add additional validation here)
    $member_id = intval($member_id); // Convert to an integer to prevent SQL injection

    // Prepare the delete query
    $sql = "DELETE FROM mamber WHERE mamber_id = '$member_id'";

    // Execute the delete query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Member deleted successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error deleting member: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }
} else {
    $_SESSION['status'] = "Invalid request!";
    $_SESSION['status_type'] = "error";
}

// Redirect to the member list page
header('Location: member.php');
exit;
?>
