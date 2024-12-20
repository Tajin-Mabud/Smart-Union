
<?php include 'includes/header.php'; ?>

<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $established = mysqli_real_escape_string($connect, $_POST['established']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $type = mysqli_real_escape_string($connect, $_POST['type']);

    // Prepare the insert query
    $sql = "INSERT INTO institution (name, createAt, address, status) VALUES ('$name', '$established', '$address', '$type')";

    // Execute the insert query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Institution added successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error adding institution: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    // Redirect back to the add page to show messages
    header("Location: institution.php");
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
                    <h4>Add Institution</h4>
                </div>

                <!-- Display Status Message -->
                <?php echo $status_message; ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="established">Established Date</label>
                        <input type="date" name="established" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" class="form-control" required>
                            <option value="প্রাথমিক বিদ্যালয়">প্রাথমিক বিদ্যালয়</option>
                            <option value="মাধ্যমিক বিদ্যালয়">মাধ্যমিক বিদ্যালয়</option>
                            <option value="মহাবিদ্যালয়">মহাবিদ্যালয়</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Add Institution</button>
                    <a href="institution.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
