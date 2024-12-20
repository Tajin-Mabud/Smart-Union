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
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h4>Member</h4>
                    <a href="member-add.php" class="btn btn-success btn-sm">Add</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Time</th>
                                <th>Word No</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM mamber ORDER BY mamber_id DESC";
                            $result = mysqli_query($connect, $sql);
                            
                            if (mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $i; ?></th>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['time']; ?></td>
                                        <td><?php echo $row['word_no']; ?></td>
                                        <td class="color-primary"><?php echo $row['phone']; ?></td>
                                        <td class="color-primary"><?php echo $row['status']; ?></td>
                                        <td>
                                        <a href="member-edit.php?id=<?php echo $row['mamber_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $row['mamber_id']; ?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $i++;
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
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
<script>
    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default anchor click behavior
            const memberId = this.getAttribute('data-id'); // Get the member ID from data attribute

            // Show the SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete.php with the member ID
                    window.location.href = 'member-delete.php?id=' + memberId;
                }
            });
        });
    });
</script>
