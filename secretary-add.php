

<?php include 'includes/header.php';

$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Add Socib</h4>
                </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Socib</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);

    // Prepare the insert query
    $sql = "INSERT INTO socib (name, phone) VALUES ('$name', '$phone')";

    // Execute the insert query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Socib added successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error adding Socib: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    // Redirect to the Socib list page
    header('Location: secretary.php');
    exit;
}
?>

<?php include 'includes/footer.php'; ?>

