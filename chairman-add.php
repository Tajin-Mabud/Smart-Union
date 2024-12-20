<?php
include 'includes/header.php'; 
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Add chairman to the database on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    // Insert query
    $sql = "INSERT INTO chairman (name, time, phone, status) VALUES ('$name', '$time', '$phone', '$status')";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Chairman added successfully!";
        $_SESSION['status_type'] = "success";
        header('Location: chairman.php');
        exit;
    } else {
        $_SESSION['status'] = "Error adding chairman: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Add Chairman</h4>
                </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="বর্তমান">বর্তমান (Current)</option>
                            <option value="সাবেক">সাবেক (Former)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Chairman</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
