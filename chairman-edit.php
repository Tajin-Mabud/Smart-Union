<?php
include 'includes/header.php'; 
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the chairman ID is set in the URL
if (isset($_GET['id'])) {
    $chairman_id = $_GET['id'];

    // Fetch the chairman details
    $sql = "SELECT * FROM chairman WHERE chairman_id = $chairman_id";
    $result = mysqli_query($connect, $sql);

    // Check if the record exists
    if (mysqli_num_rows($result) > 0) {
        $chairman = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['status'] = "Chairman not found!";
        $_SESSION['status_type'] = "error";
        header('Location: chairman.php');
        exit;
    }
}

// Update chairman details on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    // Update query
    $sql = "UPDATE chairman SET name='$name', time='$time', phone='$phone', status='$status' WHERE chairman_id = $chairman_id";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Chairman updated successfully!";
        $_SESSION['status_type'] = "success";
        header('Location: chairman.php');
        exit;
    } else {
        $_SESSION['status'] = "Error updating chairman: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Edit Chairman</h4>
                </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $chairman['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" class="form-control" value="<?php echo $chairman['time']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $chairman['phone']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="বর্তমান" <?php echo ($chairman['status'] == 'বর্তমান') ? 'selected' : ''; ?>>বর্তমান (Current)</option>
                            <option value="সাবেক" <?php echo ($chairman['status'] == 'সাবেক') ? 'selected' : ''; ?>>সাবেক (Former)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Chairman</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
