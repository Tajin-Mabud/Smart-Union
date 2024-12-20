
<?php include 'includes/header.php' ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    
<?php

$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');


// SQL query to count rows with status = 'Pending'
$sql = "SELECT COUNT(*) AS pending_count FROM sonod WHERE status = 'Pending'";
$result = mysqli_query($connect, $sql);

// Check if the query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Error: " . mysqli_error($connect);
}

?>



                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pending</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $row['pending_count']?></h2>
                                    <p class="text-white mb-0">All Time</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>

<?php

// SQL query to count rows with status = 'Pending'
// SQL query to get the total amount
$sql = "SELECT SUM(amount) AS total_amount FROM sonod";
$result = mysqli_query($connect, $sql);

// Check if the query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Error: " . mysqli_error($connect);
}
?>



                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Amount</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $row['total_amount']?></h2>
                                    <p class="text-white mb-0">All Time</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>


                    <?php

// SQL query to get the total user count
$sql = "SELECT COUNT(*) AS total_users FROM users";
$result = mysqli_query($connect, $sql);

// Check if the query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Error: " . mysqli_error($connect);
}
?>



                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total Users</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $row['total_users']?></h2>
                                    <p class="text-white mb-0">All Time</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Customer Satisfaction</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">99%</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
    <?php include 'includes/footer.php' ?>