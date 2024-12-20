<?php 
include 'includes/header.php'; 

// Check if the ID is set in the URL
if (!isset($_GET['id'])) {
    // Redirect to the allowance list or show an error
    header("Location: tax-list.php");
    exit();
}

// Connect to the database
$id = intval($_GET['id']);
$sql = "SELECT * FROM tax WHERE tax_id = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<div class='alert alert-danger'>Record not found.</div>";
    exit();
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <h4>Edit Allowance</h4>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="tax-edit.php?id=<?php echo $row['tax_id']; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo htmlspecialchars($row['father_name']); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="word_no">Word No</label>
                            <input type="text" class="form-control" id="word_no" name="word_no" value="<?php echo htmlspecialchars($row['word_no']); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="holding_no">Holding No</label>
                            <input type="text" class="form-control" id="holding_no" name="holding_no" value="<?php echo htmlspecialchars($row['holding_no']); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($row['amount']); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="method">Method</label>
                            <input type="text" class="form-control" id="method" name="method" value="<?php echo htmlspecialchars($row['method']); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="transaction">Transaction ID</label>
                            <input type="text" class="form-control" id="transaction" name="transaction" value="<?php echo htmlspecialchars($row['transaction']); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="PAID" <?php echo $row['status'] == 'PAID' ? 'selected' : ''; ?>>PAID</option>
                                <option value="Pending" <?php echo $row['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="Rejected" <?php echo $row['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" id="year" name="year" value="<?php echo htmlspecialchars($row['year']); ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="house">House</label>
                            <input type="text" class="form-control" id="house" name="house" value="<?php echo htmlspecialchars($row['house']); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nid">NID</label>
                            <input type="text" class="form-control" id="nid" name="nid" value="<?php echo htmlspecialchars($row['nid']); ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Allowance</button>
                </form>

                <?php
                // Handle form submission
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Sanitize and validate input
                    $name = mysqli_real_escape_string($connect, $_POST['name']);
                    $father_name = mysqli_real_escape_string($connect, $_POST['father_name']);
                    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
                    $word_no = mysqli_real_escape_string($connect, $_POST['word_no']);
                    $holding_no = mysqli_real_escape_string($connect, $_POST['holding_no']);
                    $amount = mysqli_real_escape_string($connect, $_POST['amount']);
                    $method = mysqli_real_escape_string($connect, $_POST['method']);
                    $transaction = mysqli_real_escape_string($connect, $_POST['transaction']);
                    $status = mysqli_real_escape_string($connect, $_POST['status']);
                    $year = mysqli_real_escape_string($connect, $_POST['year']);
                    $house = mysqli_real_escape_string($connect, $_POST['house']);
                    $nid = mysqli_real_escape_string($connect, $_POST['nid']);

                    // Update the database
                    $sql = "UPDATE tax 
                            SET name='$name', father_name='$father_name', phone='$phone', word_no='$word_no', holding_no='$holding_no', 
                                amount='$amount', method='$method', transaction='$transaction', status='$status', 
                                year='$year', house='$house', nid='$nid' 
                            WHERE tax_id = $id";

                    if (mysqli_query($connect, $sql)) {
                        $_SESSION['status'] = "Allowance updated successfully!";
                        $_SESSION['status_type'] = 'success';
                        header("Location: tax-edit.php?id=$id");
                        exit();
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
