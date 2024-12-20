<?php include 'includes/header.php'; ?>

<?php
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = mysqli_real_escape_string($connect, $_POST['category_name']);

    if (!empty($category_name)) {
        $sql = "INSERT INTO doctor_category (name) VALUES ('$category_name')";
        if (mysqli_query($connect, $sql)) {
            $_SESSION['status'] = "Category added successfully!";
            $_SESSION['status_type'] = "success";
            header('Location: category.php');
        } else {
            $_SESSION['status'] = "Error adding category!";
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
                <h4>Add Category</h4>
                <form action="category-add.php" method="POST">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                    <a href="category.php" class="btn btn-secondary">Back to Categories</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
