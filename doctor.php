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
        <!-- Add Doctor Button -->
        <div class="d-flex justify-content-between mb-3">
            <h4>Doctor</h4>
            <a href="doctor-add.php" class="btn btn-primary">Add Doctor</a>
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
                                <th>Phone</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Updated SQL query with JOIN
                            $sql = "SELECT d.*, c.name as category_name FROM doctor d 
                                    JOIN doctor_category c ON d.category_id = c.category_id 
                                    ORDER BY d.doctor_id DESC";
                            $result = mysqli_query($connect, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $i; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['category_name']; ?></td> <!-- Display category name here -->

                                        <td>
                                            <!-- Edit Button -->
                                            <a href="doctor-edit.php?id=<?php echo $row['doctor_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            
                                            <!-- Delete Button -->
                                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['doctor_id']; ?>)">Delete</button>
                                        </td>
                                    </tr>
                                    <?php 
                                    $i++;
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
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
    function confirmDelete(doctor_id) {
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
                // Redirect to the delete.php page with doctor ID
                window.location.href = "doctor-delete.php?id=" + doctor_id;
            }
        });
    }
</script>
