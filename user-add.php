<?php
include 'includes/header.php';
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password
    $blood_group = mysqli_real_escape_string($connect, $_POST['blood_group']);

    $sql = "INSERT INTO users (name, phone, email, password, blood, createAt) 
            VALUES ('$name', '$phone', '$email', '$password', '$blood_group', NOW())";

    if (mysqli_query($connect, $sql)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'User added successfully!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'user-list.php';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Failed to add user!',
                text: '" . mysqli_error($connect) . "',
                confirmButtonText: 'OK'
            });
        </script>";
    }
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <h4>Add User</h4>
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <input type="text" name="blood_group" class="form-control" id="blood_group">
                            </div>
                            <button type="submit" class="btn btn-primary">Add User</button>
                            <a href="user-list.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
