<?php include 'includes/header.php'; ?>

<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the category ID is set in the URL
if (isset($_GET['id'])) {
    $category_id = mysqli_real_escape_string($connect, $_GET['id']);

    // Fetch the existing category details
    $sql = "SELECT * FROM doctor_category WHERE category_id = '$category_id'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $category_name = $row['name'];
    } else {
        $_SESSION['status'] = "Category not found!";
        $_SESSION['status_type'] = "error";
        header('Location: category.php');
        exit();
    }
} else {
    $_SESSION['status'] = "Invalid category ID!";
    $_SESSION['status_type'] = "error";
    header('Location: category.php');
    exit();
}

// Update the category when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = mysqli_real_escape_string($connect, $_POST['category_name']);

    if (!empty($category_name)) {
        $sql = "UPDATE doctor_category SET name = '$category_name' WHERE category_id = '$category_id'";
        if (mysqli_query($connect, $sql)) {
            $_SESSION['status'] = "Category updated successfully!";
            $_SESSION['status_type'] = "success";
            header('Location: category.php');
        } else {
            $_SESSION['status'] = "Error updating category!";
            $_SESSION['status_type'] = "error";
        }
    } else {
        $_SESSION['status'] = "Category name cannot be empty!";
        $_SESSION['status_type'] = "warning";
    }
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <h4>Edit Category</h4>
                <form action="category-edit.php?id=<?php echo $category_id; ?>" method="POST">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $category_name; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                    <a href="category.php" class="btn btn-secondary">Back to Categories</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
