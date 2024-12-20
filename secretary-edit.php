<?php include 'includes/header.php'; ?>


<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Fetch the record to edit
if (isset($_GET['id'])) {
    $socib_id = mysqli_real_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM socib WHERE isocib_id = '$socib_id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    header('Location: socib.php'); // Redirect if no id is provided
    exit;
}
?>


<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Edit Socib</h4>
                </div>
                <form action="" method="POST">
                    <input type="hidden" name="socib_id" value="<?php echo $row['isocib_id']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $socib_id = mysqli_real_escape_string($connect, $_POST['socib_id']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);

    // Prepare the update query
    $sql = "UPDATE socib SET name='$name', phone='$phone' WHERE isocib_id='$socib_id'";

    // Execute the update query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Socib record updated successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error updating record: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    // Redirect to the Socib list page
    header('Location: secretary.php');
    exit;
}
?>
<?php include 'includes/footer.php'; ?>
