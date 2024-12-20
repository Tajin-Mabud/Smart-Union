<?php 
include 'includes/header.php'; 
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $member_id = $_GET['id'];

    // Fetch the member data from the database
    $sql = "SELECT * FROM mamber WHERE mamber_id = '$member_id'";
    $result = mysqli_query($connect, $sql);
    
    // Check if the member exists
    if (mysqli_num_rows($result) > 0) {
        $member = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Member not found!'); window.location.href='member_list.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='member_list.php';</script>";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $time = $_POST['time'];
    $word_no = $_POST['word_no'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

    // Update the member data in the database
    $update_sql = "UPDATE mamber SET name='$name', time='$time', word_no='$word_no', phone='$phone', status='$status' WHERE mamber_id='$member_id'";
    
    if (mysqli_query($connect, $update_sql)) {
        $_SESSION['status'] = "Member updated successfully!";
        $_SESSION['status_type'] = "success";
        header('Location: member.php');
        exit;
    } else {
        echo "<script>alert('Error updating member!');</script>";
    }
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Edit Member</h4>
                </div>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $member['name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" class="form-control" name="time" id="time" value="<?php echo $member['time']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="word_no">Word No</label>
                        <input type="text" class="form-control" name="word_no" id="word_no" value="<?php echo $member['word_no']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $member['phone']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" id="status" value="<?php echo $member['status']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Member</button>
                    <a href="member_list.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
