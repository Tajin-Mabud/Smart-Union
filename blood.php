<?php include 'includes/header.php'; ?>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

if (isset($_SESSION['status_type']) && $_SESSION['status_type'] == 'success') {
    $status = $_SESSION['status'];

    echo "<script>
            window.addEventListener('load', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{$status}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            });
          </script>";
    
    unset($_SESSION['status']);
    unset($_SESSION['status_type']);
}
?>

<div class="content-body">
    <div class="container-fluid mt-3">
        <!-- Add Chairman Button -->
        <div class="d-flex justify-content-between mb-3">
            <h4>Blood</h4>
            <a href="blood-add.php" class="btn btn-primary">Add Donner</a>
        </div>

        <!-- /# column -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM blood ORDER BY blood_id DESC";
                            $result = mysqli_query($connect,  $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $i; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['blood_group']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="blood-edit.php?id=<?php echo $row['blood_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            
                                            <!-- Delete Button -->
                                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['blood_id']; ?>)">Delete</button>
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
        <!-- /# column -->
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- SweetAlert Delete Confirmation -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(chairman_id) {
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
                // Redirect to the delete.php page with chairman ID
                window.location.href = "blood-delete.php?id=" + chairman_id;
            }
        });
    }
</script>
