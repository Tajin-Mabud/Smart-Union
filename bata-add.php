<?php include 'includes/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $serial_no = $_POST['serial_no'];
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $word_no = $_POST['word_no'];
    $value = $_POST['value'];
    $category = $_POST['category'];

    // Insert the data into the database
    $sql = "INSERT INTO bata (serial_no, name, father_name, phone, address, word_no, value, category) VALUES ('$serial_no', '$name', '$father_name', '$phone', '$address', '$word_no', '$value', '$category')";
    
    if (mysqli_query($connect, $sql)) {
        // Set success message
        $_SESSION['status'] = "Allowance added successfully!";
        $_SESSION['status_type'] = 'success';
        header('Location: bata-add.php'); // Redirect to the same page
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($connect) . "');</script>";
    }
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <h4>Add Allowance</h4>

        <!-- Card View for Form -->
        <div class="card">
            <div class="card-body">
                <form method="POST" action="bata-add.php">
                    <div class="form-group">
                        <label for="serial_no">Serial No</label>
                        <input type="text" class="form-control" id="serial_no" name="serial_no" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father's Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="word_no">Word No</label>
                        <input type="text" class="form-control" id="word_no" name="word_no" required>
                    </div>
                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="number" class="form-control" id="value" name="value" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="BGF">ভি জি এফ ভাতা</option>
                            <option value="BIDOBA">বিধবা ভাতা</option>
                            <option value="POTIBONDI">প্রতিবন্ধী ভাতা</option>
                            <option value="MOTHER">মাতৃত্ব ভাতা</option>
                            <option value="BGD">ভিজিডি  ভাতা </option>
                            <option value="BOYOSKO">বয়স্ক ভাতা</option>
                            <option value="MUKTI">মুক্তিযোদ্ধা ভাতা</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Allowance</button>
                    <a href="bata.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- SweetAlert Notification -->
<?php if (isset($_SESSION['status_type']) && $_SESSION['status_type'] == 'success') : ?>
<script>
    window.addEventListener('load', function() {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?php echo $_SESSION['status']; ?>',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    });
</script>
<?php 
    unset($_SESSION['status']);
    unset($_SESSION['status_type']);
endif; 
?>
