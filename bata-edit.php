<?php include 'includes/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $bata_id = $_GET['id'];

    // Fetch the current data for the allowance
    $sql = "SELECT * FROM bata WHERE bata_id = '$bata_id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if record exists
    if (!$row) {
        echo "<script>alert('No record found'); window.location.href='bata.php';</script>";
        exit();
    }
}

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

    // Update the data in the database
    $sql = "UPDATE bata SET serial_no='$serial_no', name='$name', father_name='$father_name', phone='$phone', address='$address', word_no='$word_no', value='$value', category='$category' WHERE bata_id='$bata_id'";
    
    if (mysqli_query($connect, $sql)) {
        // Set success message
        $_SESSION['status'] = "Allowance updated successfully!";
        $_SESSION['status_type'] = 'success';
        header('Location: bata-edit.php?id=' . $bata_id); // Redirect to the edit page
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($connect) . "');</script>";
    }
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <h4>Edit Allowance</h4>

        <!-- Card View for Form -->
        <div class="card">
            <div class="card-body">
                <form method="POST" action="bata-edit.php?id=<?php echo $bata_id; ?>">
                    <div class="form-group">
                        <label for="serial_no">Serial No</label>
                        <input type="text" class="form-control" id="serial_no" name="serial_no" value="<?php echo $row['serial_no']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father's Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $row['father_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" required><?php echo $row['address']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="word_no">Word No</label>
                        <input type="text" class="form-control" id="word_no" name="word_no" value="<?php echo $row['word_no']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="text" class="form-control" id="value" name="value" value="<?php echo $row['value']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="" disabled>Select Category</option>
                            <option value="BGF" <?php echo ($row['category'] == 'BGF') ? 'selected' : ''; ?>>ভি জি এফ ভাতা</option>
                            <option value="BIDOBA" <?php echo ($row['category'] == 'BIDOBA') ? 'selected' : ''; ?>>বিধবা ভাতা</option>
                            <option value="POTIBONDI" <?php echo ($row['category'] == 'POTIBONDI') ? 'selected' : ''; ?>>প্রতিবন্ধী ভাতা</option>
                            <option value="MOTHER" <?php echo ($row['category'] == 'MOTHER') ? 'selected' : ''; ?>>মাতৃত্ব ভাতা</option>
                            <option value="BGD" <?php echo ($row['category'] == 'BGD') ? 'selected' : ''; ?>>ভিজিডি  ভাতা</option>
                            <option value="BOYOSKO" <?php echo ($row['category'] == 'BOYOSKO') ? 'selected' : ''; ?>>বয়স্ক ভাতা</option>
                            <option value="MUKTI" <?php echo ($row['category'] == 'MUKTI') ? 'selected' : ''; ?>>মুক্তিযোদ্ধা ভাতা</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Allowance</button>
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
