<?php
include 'includes/header.php';
header('Content-Type: text/html; charset=utf-8');

// Initialize variables
$status = '';
$status_type = '';

// Check if the `id` is provided in the URL
if (isset($_GET['id'])) {
    $blood_id = $_GET['id'];

    
    $sql = "SELECT * FROM blood WHERE blood_id = '$blood_id'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $donor = mysqli_fetch_assoc($result);
    } else {
        $status = "Donor not found.";
        $status_type = 'error';
    }
} else {
    // Redirect if no id is provided
    header("Location: blood.php");
    exit();
}

// Update logic when the form is submitted
if (isset($_POST['update_donor'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $blood_group = mysqli_real_escape_string($connect, $_POST['blood_group']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);

    // Update donor information in the blood table
    $sql = "UPDATE blood SET name = '$name', blood_group = '$blood_group', phone = '$phone', address = '$address' WHERE blood_id = '$blood_id'";
    
    if (mysqli_query($connect, $sql)) {
        $status = "Donor updated successfully!";
        $status_type = 'success';
    } else {
        $status = "Failed to update donor. Please try again.";
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
                        <h4 class="card-title">Edit Blood Donor</h4>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Donor Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $donor['name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" class="form-control" required>
                                    <option value="">Select Blood Group</option>
                                    <option value="A+" <?php if ($donor['blood_group'] == 'A+') echo 'selected'; ?>>A+</option>
                                    <option value="A-" <?php if ($donor['blood_group'] == 'A-') echo 'selected'; ?>>A-</option>
                                    <option value="B+" <?php if ($donor['blood_group'] == 'B+') echo 'selected'; ?>>B+</option>
                                    <option value="B-" <?php if ($donor['blood_group'] == 'B-') echo 'selected'; ?>>B-</option>
                                    <option value="AB+" <?php if ($donor['blood_group'] == 'AB+') echo 'selected'; ?>>AB+</option>
                                    <option value="AB-" <?php if ($donor['blood_group'] == 'AB-') echo 'selected'; ?>>AB-</option>
                                    <option value="O+" <?php if ($donor['blood_group'] == 'O+') echo 'selected'; ?>>O+</option>
                                    <option value="O-" <?php if ($donor['blood_group'] == 'O-') echo 'selected'; ?>>O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $donor['phone']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" required><?php echo $donor['address']; ?></textarea>
                            </div>
                            <button type="submit" name="update_donor" class="btn btn-primary">Update Donor</button>
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
