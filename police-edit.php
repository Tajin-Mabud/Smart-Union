
<?php include 'includes/header.php'; ?>

<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the ID is set in the URL
if (!isset($_GET['id'])) {
    header('Location: police.php'); // Redirect to the list page if no ID is provided
    exit;
}

// Get the police ID from the URL
$police_id = mysqli_real_escape_string($connect, $_GET['id']);

// Fetch the existing police record from the database
$sql = "SELECT * FROM village_police WHERE police_id = '$police_id'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 0) {
    header('Location: police.php'); // Redirect if no record found
    exit;
}

$row = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);

    // Prepare the update query
    $sql = "UPDATE village_police SET name = '$name', phone = '$phone' WHERE police_id = '$police_id'";

    // Execute the update query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Police updated successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error updating police: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    // Redirect back to the edit page to show messages
    header("Location: police.php");
    exit;
}

// Display success or error message
$status_message = '';
if (isset($_SESSION['status'])) {
    $status_message = "<div class='alert alert-{$_SESSION['status_type']}'>{$_SESSION['status']}</div>";
    unset($_SESSION['status']);
    unset($_SESSION['status_type']);
}
?>


<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Edit Police</h4>
                </div>

                <!-- Display Status Message -->
                <?php echo $status_message; ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update Police</button>
                    <a href="police.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
