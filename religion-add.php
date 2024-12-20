<?php include 'includes/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate input
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    if (!empty($name) && !empty($address) && !empty($status)) {
        // Insert into database
        $sql = "INSERT INTO dormo (name, address, status) VALUES ('$name', '$address', '$status')";
        if (mysqli_query($connect, $sql)) {
            $_SESSION['status'] = 'Religion added successfully!';
            $_SESSION['status_type'] = 'success';
            header("Location: religion-add.php");
        } else {
            $_SESSION['status'] = 'Failed to add religion.';
            $_SESSION['status_type'] = 'error';
        }
    } else {
        $_SESSION['status'] = 'All fields are required!';
        $_SESSION['status_type'] = 'error';
    }
}

// Show success or error message
if (isset($_SESSION['status_type']) && $_SESSION['status_type'] == 'success') {
    $status = $_SESSION['status'];
    echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{$status}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
          </script>";
    unset($_SESSION['status']);
    unset($_SESSION['status_type']);
} elseif (isset($_SESSION['status_type']) && $_SESSION['status_type'] == 'error') {
    $status = $_SESSION['status'];
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{$status}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
          </script>";
    unset($_SESSION['status']);
    unset($_SESSION['status_type']);
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <h4>Add Religion</h4>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Religion Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter religion name" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>Select status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Religion</button>
                    <a href="religion.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
