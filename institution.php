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
            <div class="card-title d-flex justify-content-between">
                <h4>Institution List</h4>
                <a href="institution-add.php" class="btn btn-success">Add Institution</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Established</th>
                            <th>Address</th>
                            <th>Type</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT * FROM institution ORDER BY institution_id DESC";
                        $result = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <th><?php echo $i; ?></th>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['createAt']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['status']; ?></td>

                            <td>
                                <a href="institution-edit.php?id=<?php echo $row['institution_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $row['institution_id']; ?>">Delete</button>
                            </td>
                        </tr>
                        <?php 
                            $i++;
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- SweetAlert2 and Delete Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const policeId = this.getAttribute('data-id');
            
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
                    // Redirect to delete
                    window.location.href = `institution-delete.php?id=${policeId}`;
                }
            });
        });
    });
</script>
