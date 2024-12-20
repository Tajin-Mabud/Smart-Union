<?php
include 'includes/header.php';
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Fetch all users from the users table
$sql = "SELECT * FROM users ORDER BY user_id DESC";
$result = mysqli_query($connect, $sql);
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mb-3">
                    <h4>Users</h4>
                    <a href="user-add.php" class="btn btn-primary">Add User</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Joain Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if (mysqli_num_rows($result) > 0) {
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <th><?php echo $i; ?></th>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo date("d M Y", strtotime($row['createAt'])); ?></td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="user-edit.php?id=<?php echo $row['user_id']; ?>" class="btn btn-primary btn-sm">Edit</a>

                                                    <!-- Delete Button -->
                                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['user_id']; ?>)">Delete</button>
                                                </td>
                                            </tr>
                                            <?php 
                                            $i++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- SweetAlert Delete Confirmation -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(user_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the delete.php page with user ID
                window.location.href = "user-delete.php?id=" + user_id;
            }
        });
    }
</script>
