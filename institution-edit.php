<?php include 'includes/header.php'; ?>


<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the ID is provided
if (isset($_GET['id'])) {
    $institution_id = mysqli_real_escape_string($connect, $_GET['id']);

    // Fetch the current institution data
    $sql = "SELECT * FROM institution WHERE institution_id = '$institution_id'";
    $result = mysqli_query($connect, $sql);
    $institution = mysqli_fetch_assoc($result);

    if (!$institution) {
        $_SESSION['status'] = "Institution not found!";
        $_SESSION['status_type'] = "error";
        header("Location: institution.php");
        exit;
    }
} else {
    $_SESSION['status'] = "Invalid request. No ID provided.";
    $_SESSION['status_type'] = "error";
    header("Location: institution.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $createAt = mysqli_real_escape_string($connect, $_POST['createAt']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    // Update the institution
    $update_sql = "UPDATE institution SET name='$name', createAt='$createAt', address='$address', status='$status' WHERE institution_id = '$institution_id'";

    if (mysqli_query($connect, $update_sql)) {
        $_SESSION['status'] = "Institution updated successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error updating institution: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    header("Location: institution.php");
    exit;
}
?>


<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Edit Institution</h4>
                </div>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($institution['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="createAt">Established Date</label>
                        <input type="date" class="form-control" name="createAt" id="createAt" value="<?php echo htmlspecialchars($institution['createAt']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo htmlspecialchars($institution['address']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Type</label>
                        <input type="text" class="form-control" name="status" id="status" value="<?php echo htmlspecialchars($institution['status']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Institution</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
