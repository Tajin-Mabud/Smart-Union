<?php include 'includes/header.php'; 
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Add Member</h4>
                </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="word_no">Word No</label>
                        <input type="text" name="word_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="বর্তমান">বর্তমান (Current)</option>
                            <option value="সাবেক">সাবেক (Former)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $word_no = mysqli_real_escape_string($connect, $_POST['word_no']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);

    // Prepare the insert query
    $sql = "INSERT INTO mamber (name, time, word_no, phone, status) VALUES ('$name', '$time', '$word_no', '$phone', '$status')";

    // Execute the insert query
    if (mysqli_query($connect, $sql)) {
        $_SESSION['status'] = "Member added successfully!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error adding member: " . mysqli_error($connect);
        $_SESSION['status_type'] = "error";
    }

    // Redirect to the member list page
    header('Location: member.php');
} else {
    $_SESSION['status'] = "Invalid request!";
    $_SESSION['status_type'] = "error";
    header('Location: member.php');
}

?>