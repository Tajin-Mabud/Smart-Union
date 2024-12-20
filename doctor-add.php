<?php 
include 'includes/header.php'; 
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Fetch categories for the dropdown
$category_sql = "SELECT * FROM doctor_category ORDER BY name";
$category_result = mysqli_query($connect, $category_sql);
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <h4>Add Doctor</h4>

        <div class="card">
            <div class="card-body">
                <form action="doctor-add.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Doctor Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category_id" required>
                            <option value="">Select a category</option>
                            <?php 
                            // Populate the dropdown with categories
                            while ($category = mysqli_fetch_assoc($category_result)) {
                                echo "<option value='{$category['category_id']}'>{$category['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Doctor</button>
                </form>
                
                <?php 
                // Handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = mysqli_real_escape_string($connect, $_POST['name']);
                    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
                    $category_id = (int)$_POST['category_id'];

                    // Insert the new doctor into the database
                    $insert_sql = "INSERT INTO doctor (name, phone, category_id) VALUES ('$name', '$phone', '$category_id')";
                    if (mysqli_query($connect, $insert_sql)) {
                        $_SESSION['status'] = "Doctor added successfully!";
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
