<?php include 'includes/header.php'; ?>


<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);

    // Prepare the insert query
    $sql = "INSERT INTO village_police (name, phone) VALUES ('$name', '$phone')";

    // Execute the insert query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Police added successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error adding police: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    // Redirect back to the same page to show messages
    header('Location: police.php');
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
                    <h4>Add Police</h4>
                </div>

                <!-- Display Status Message -->
                <?php echo $status_message; ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Police</button>
                    <a href="police.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
