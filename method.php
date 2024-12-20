<?php
include 'includes/header.php';
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Initialize variables
$status = '';
$status_type = '';

// Check if the `method_id` is provided in the URL
    $method_id = "1";

    // Fetch the current data from the `method` table
    $sql = "SELECT * FROM method WHERE method_id = '$method_id'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $method_data = mysqli_fetch_assoc($result);
    } else {
        $status = "Payment method not found.";
        $status_type = 'error';
    }
// Update logic when the form is submitted
if (isset($_POST['update_method'])) {
    $bkash = mysqli_real_escape_string($connect, $_POST['bkash']);
    $nagad = mysqli_real_escape_string($connect, $_POST['nagad']);

    // Update the data in the method table
    $sql = "UPDATE method SET bkash = '$bkash', nogod = '$nagad' WHERE method_id = '$method_id'";
    
    if (mysqli_query($connect, $sql)) {
        $status = "Payment method updated successfully!";
        $status_type = 'success';
    } else {
        $status = "Failed to update payment method. Please try again.";
        $status_type = 'error';
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
if ($status_type == 'success') {
    echo "<script>
            window.addEventListener('load', function() {
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
            });
          </script>";
} elseif ($status_type == 'error') {
    echo "<script>
            window.addEventListener('load', function() {
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
            });
          </script>";
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Payment Method</h4>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="bkash">Bkash Number</label>
                                <input type="text" name="bkash" class="form-control" value="<?php echo $method_data['bkash']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nagad">Nagad Number</label>
                                <input type="text" name="nagad" class="form-control" value="<?php echo $method_data['nogod']; ?>" required>
                            </div>
                            <button type="submit" name="update_method" class="btn btn-primary">Update Method</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
