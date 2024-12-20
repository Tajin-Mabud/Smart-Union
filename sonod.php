<?php include 'includes/header.php'; 


if(isset($_GET['c'])){

    $category = $_GET['c'];

}else{

    header("Location: index.php");

}

?>

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
                <div class="card-title">
                    <h4>সনদ আবেদন লিস্ট</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>User Name</th>
                                <th>Payment Method</th>
                                <th>Transaction</th>
                                <th>Amount</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                // Query to fetch data
                                $sql = "SELECT sonod_id, sonod_name, user_name, payment_method, transaction, amount, payment_status, status FROM sonod WHERE sonod_name= '$category' ORDER BY sonod_id DESC";
                                $result = mysqli_query($connect, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<th>" . $i . "</th>";
                                        echo "<td>" . $row['sonod_name'] . "</td>";
                                        echo "<td>" . $row['user_name'] . "</td>";
                                        echo "<td>" . $row['payment_method'] . "</td>";
                                        echo "<td>" . $row['transaction'] . "</td>";
                                        echo "<td>" . $row['amount'] . "</td>";
                                        echo "<td>" . $row['payment_status'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo '<td>
                                                <a href="sonod-edit.php?id=' . $row['sonod_id'] . '" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete-btn" data-id="' . $row['sonod_id'] . '">Delete</a>
                                              </td>';
                                        echo "</tr>";
                                        $i++;
                                    }
                                } else {
                                    echo "<tr><td colspan='9' class='text-center'>No records found</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default action
            
            const sonodId = this.getAttribute('data-id'); // Get the ID from data attribute
            
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
                    // If confirmed, redirect to the delete.php page
                    window.location.href = 'sonod-delete.php?id=' + sonodId;
                }
            });
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
