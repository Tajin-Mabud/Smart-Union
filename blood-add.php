<?php
include 'includes/header.php';
header('Content-Type: text/html; charset=utf-8');

// Initialize variables
$status = '';
$status_type = '';

// Check if form is submitted
if (isset($_POST['add_donor'])) {
    // Database connection
    
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $blood_group = mysqli_real_escape_string($connect, $_POST['blood_group']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);

    // Insert data into the blood table
    $sql = "INSERT INTO blood (name, blood_group, phone, address) VALUES ('$name', '$blood_group', '$phone', '$address')";
    
    if (mysqli_query($connect, $sql)) {
        $status = "Donor added successfully!";
        $status_type = 'success';
    } else {
        $status = "Failed to add donor. Please try again.";
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
                        <h4 class="card-title">Add Blood Donor</h4>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Donor Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" class="form-control" required>
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" required></textarea>
                            </div>
                            <button type="submit" name="add_donor" class="btn btn-primary">Add Donor</button>
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
