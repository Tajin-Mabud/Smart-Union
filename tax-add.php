<?php include 'includes/header.php'; ?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <h4>Add Allowance</h4>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="tax-add.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_name">Father Name</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="word_no">Word No</label>
                            <input type="text" class="form-control" id="word_no" name="word_no" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="holding_no">Holding No</label>
                            <input type="text" class="form-control" id="holding_no" name="holding_no" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="method">Method</label>
                            <input type="text" class="form-control" id="method" name="method" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="transaction">Transaction ID</label>
                            <input type="text" class="form-control" id="transaction" name="transaction" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="PAID">PAID</option>
                                <option value="Pending">Pending</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" id="year" name="year" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="house">House</label>
                            <input type="text" class="form-control" id="house" name="house" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nid">NID</label>
                            <input type="text" class="form-control" id="nid" name="nid" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Allowance</button>
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

                    // Insert into the database
                    $sql = "INSERT INTO tax (name, father_name, phone, word_no, holding_no, amount, method, transaction, status, year, house, nid) 
                            VALUES ('$name', '$father_name', '$phone', '$word_no', '$holding_no', '$amount', '$method', '$transaction', '$status', '$year', '$house', '$nid')";

                    if (mysqli_query($connect, $sql)) {
                        $_SESSION['status'] = "Allowance added successfully!";
                        $_SESSION['status_type'] = 'success';
                        header("Location: tax.php");
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
