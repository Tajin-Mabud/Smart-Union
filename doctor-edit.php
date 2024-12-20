<?php 
include 'includes/header.php'; 
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Fetch the doctor ID from the URL
if (isset($_GET['id'])) {
    $doctor_id = (int)$_GET['id'];

    // Fetch the doctor's current details
    $doctor_sql = "SELECT d.*, c.name as category_name FROM doctor d 
                   JOIN doctor_category c ON d.category_id = c.category_id 
                   WHERE d.doctor_id = $doctor_id";
    $doctor_result = mysqli_query($connect, $doctor_sql);
    $doctor = mysqli_fetch_assoc($doctor_result);

    // Fetch categories for the dropdown
    $category_sql = "SELECT * FROM doctor_category ORDER BY name";
    $category_result = mysqli_query($connect, $category_sql);
} else {
    header('Location: doctor.php'); // Redirect if no ID is provided
    exit;
}

?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <h4>Edit Doctor</h4>

        <div class="card">
            <div class="card-body">
                <form action="doctor-edit.php?id=<?php echo $doctor_id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Doctor Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($doctor['name']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($doctor['phone']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category_id" required>
                            <option value="">Select a category</option>
                            <?php 
                            // Populate the dropdown with categories
                            while ($category = mysqli_fetch_assoc($category_result)) {
                                $selected = ($category['category_id'] == $doctor['category_id']) ? 'selected' : '';
                                echo "<option value='{$category['category_id']}' $selected>{$category['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Doctor</button>
                </form>
                
                <?php 
                // Handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = mysqli_real_escape_string($connect, $_POST['name']);
                    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
                    $category_id = (int)$_POST['category_id'];

                    // Update the doctor's details in the database
                    $update_sql = "UPDATE doctor SET name = '$name', phone = '$phone', category_id = $category_id WHERE doctor_id = $doctor_id";
                    if (mysqli_query($connect, $update_sql)) {
                        $_SESSION['status'] = "Doctor updated successfully!";
                        $_SESSION['status_type'] = "success";
                        header('Location: doctor.php'); // Redirect back to the doctor list
                        exit;
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . mysqli_error($connect) . "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
