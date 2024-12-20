<?php
include 'includes/header.php';
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Initialize variables
$status = '';
$status_type = '';

// Check if `user_id` is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user details from the users table
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($connect, $sql);

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
    } else {
        $status = "User not found.";
        $status_type = 'error';
    }
} else {
    // Redirect if no `user_id` is provided
    header("Location: users.php");
    exit();
}

// Update logic when the form is submitted
if (isset($_POST['update_user'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);

    // Update the user information in the users table
    $sql = "UPDATE users SET name = '$name', phone = '$phone', email = '$email' WHERE user_id = '$user_id'";
    
    if (mysqli_query($connect, $sql)) {
        $status = "User updated successfully!";
        $status_type = 'success';
    } else {
        $status = "Failed to update user. Please try again.";
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
                        <h4 class="card-title">Edit User</h4>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $user_data['name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $user_data['phone']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $user_data['email']; ?>" required>
                            </div>
                            <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
