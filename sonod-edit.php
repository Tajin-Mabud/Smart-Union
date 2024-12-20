<?php

include 'includes/header.php';
$connect->set_charset("utf8mb4");
header('Content-Type: text/html; charset=utf-8');

// Fetch the existing data based on sonod_id from the URL
if (isset($_GET['id'])) {
    $sonod_id = $_GET['id'];
    
    $sql = "SELECT * FROM sonod WHERE sonod_id = $sonod_id";
    $result = mysqli_query($connect, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Record not found";
        exit;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $sonod_name = $_POST['sonod_name'];
    // Add other form fields as needed...
    
    // Check which button was clicked
    if (isset($_POST['approve'])) {
        $status = "Approved";
        // Update the record in the database
        $update_sql = "UPDATE sonod SET status = '$status' WHERE sonod_id = $sonod_id";
        mysqli_query($connect, $update_sql);
    } elseif (isset($_POST['reject'])) {
        $status = "Rejected";
        // Update the record in the database
        $update_sql = "UPDATE sonod SET status = '$status' WHERE sonod_id = $sonod_id";
        mysqli_query($connect, $update_sql);
    } else {
        // Other processing if needed...
    }

    // Optionally, redirect or refresh the page after processing
    $_SESSION['status'] = 'Updated Success';
    $_SESSION['status_type'] = 'success';
    header("Location: sonod.php");
    exit();
}
?>



?>


<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">সনদ</h4>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Sonod ID </label>
                        <input type="text" class="form-control" value="<?php echo $row['sonod_id']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>User ID</label>
                        <input type="text" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Sonod Name</label>
                        <input type="text" name="sonod_name" class="form-control" value="<?php echo $row['sonod_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user_name" class="form-control" value="<?php echo $row['user_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" name="father_name" class="form-control" value="<?php echo $row['father_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control" value="<?php echo $row['mother_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label>ID Card</label>
                        <input type="text" name="id_card" class="form-control" value="<?php echo $row['id_card']; ?>">
                    </div>

                    <div class="form-group">
                        <label>ID Card No</label>
                        <input type="text" name="id_card_no" class="form-control" value="<?php echo $row['id_card_no']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="text" name="dob" class="form-control" value="<?php echo $row['dob']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Holding Number</label>
                        <input type="text" name="holding_number" class="form-control" value="<?php echo $row['holding_umber']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control" value="<?php echo $row['gender']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Condition Status</label>
                        <input type="text" name="condition_status" class="form-control" value="<?php echo $row['condition_status']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Present Department</label>
                        <input type="text" name="present_department" class="form-control" value="<?php echo $row['present_department']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Present District</label>
                        <input type="text" name="present_district" class="form-control" value="<?php echo $row['present_district']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Present Upazila</label>
                        <input type="text" name="present_upazila" class="form-control" value="<?php echo $row['present_upazila']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Present Post Office</label>
                        <input type="text" name="present_postoffice" class="form-control" value="<?php echo $row['present_postoffice']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Present Word No</label>
                        <input type="text" name="present_word_no" class="form-control" value="<?php echo $row['present_word_no']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Present Village</label>
                        <input type="text" name="present_village" class="form-control" value="<?php echo $row['present_village']; ?>">
                    </div>

                    <!-- Old Address Fields -->
                    <h5>Old Address</h5>
                    <div class="form-group">
                        <label>Old Department</label>
                        <input type="text" name="old_department" class="form-control" value="<?php echo $row['old_department']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Old District</label>
                        <input type="text" name="old_district" class="form-control" value="<?php echo $row['old_district']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Old Upazila</label>
                        <input type="text" name="old_upazila" class="form-control" value="<?php echo $row['old_upazila']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Old Post Office</label>
                        <input type="text" name="old_postoffice" class="form-control" value="<?php echo $row['old_postoffice']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Old Word No</label>
                        <input type="text" name="old_word_no" class="form-control" value="<?php echo $row['old_word_no']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Old Village</label>
                        <input type="text" name="old_village" class="form-control" value="<?php echo $row['old_village']; ?>">
                    </div>

                    <!-- Payment Info -->
                    <h5>Payment Information</h5>
                    <div class="form-group">
                        <label>Payment Method</label>
                        <input type="text" name="payment_method" class="form-control" value="<?php echo $row['payment_method']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Transaction</label>
                        <input type="text" name="transaction" class="form-control" value="<?php echo $row['transaction']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" name="amount" class="form-control" value="<?php echo $row['amount']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Payment Status</label>
                        <input type="text" name="payment_status" class="form-control" value="<?php echo $row['payment_status']; ?>">
                    </div>

                            <!-- Existing Document Section -->
                            <h5>Document Information</h5>

                            <!-- Photo Display with Full-Screen View -->
                            <div class="form-group">
                                <label>Photo</label><br>
                                <img src="uploads/<?php echo $row['user_image']; ?>" width="200px" class="img-thumbnail" id="photoImage" data-toggle="modal" data-target="#imageModal"><br>
                                <input type="file" name="user_image">
                            </div>

                            <!-- Document Type Based Display -->
                            <?php if ($row['document_type'] == 'nid') { ?>
                                <div class="form-group">
                                    <label>NID Front Image</label><br>
                                    <img src="uploads/<?php echo $row['nid_front']; ?>" width="200px" class="img-thumbnail" id="nidFrontImage" data-toggle="modal" data-target="#imageModal"><br>
                                    <input type="file" name="nid_front">
                                </div>
                                <div class="form-group">
                                    <label>NID Back Image</label><br>
                                    <img src="uploads/<?php echo $row['nid_back']; ?>" width="200px" class="img-thumbnail" id="nidBackImage" data-toggle="modal" data-target="#imageModal"><br>
                                    <input type="file" name="nid_back">
                                </div>
                            <?php } else { ?>
                                <div class="form-group">
                                    <label>Birth Certificate</label><br>
                                    <img src="uploads/<?php echo $row['birth_certificate']; ?>" width="200px" class="img-thumbnail" id="birthCertificateImage" data-toggle="modal" data-target="#imageModal"><br>
                                    <input type="file" name="birth_certificate">
                                </div>
                            <?php } ?>

                            <!-- Modal for Full-Screen Image View -->
                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel">Full-Screen Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img id="fullScreenImage" src="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- JavaScript to Handle Full-Screen Image Display -->
                            <script>
                                // When an image is clicked, show it in the modal
                                document.querySelectorAll('img[data-target="#imageModal"]').forEach(img => {
                                    img.addEventListener('click', function() {
                                        const src = this.getAttribute('src');
                                        document.getElementById('fullScreenImage').setAttribute('src', src);
                                    });
                                });
                            </script>

                                        <!-- Additional fields condition based on sonod_name -->
                                        <?php
                    $sonod_name= ['ওয়ারিশান সনদ', 'উত্তরাধিকারী সনদ', 'বিবিধ প্রত্যয়নপত্র', 'একই নামের প্রত্যয়ন'];
                    if (in_array($row['sonod_name'], $sonod_name)) {
                    ?>
                        <div class="form-group">
                            <label>W Name</label>
                            <input type="text" name="w_name" class="form-control" value="<?php echo $row['w_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Father</label>
                            <input type="text" name="w_father" class="form-control" value="<?php echo $row['w_father']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Mother</label>
                            <input type="text" name="w_mother" class="form-control" value="<?php echo $row['w_mother']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Gender</label>
                            <input type="text" name="w_gender" class="form-control" value="<?php echo $row['w_gender']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Religion</label>
                            <input type="text" name="w_religion" class="form-control" value="<?php echo $row['w_religion']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Resident Status</label>
                            <input type="text" name="w_resident_status" class="form-control" value="<?php echo $row['w_resident_status']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W District</label>
                            <input type="text" name="w_district" class="form-control" value="<?php echo $row['w_district']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Upazila</label>
                            <input type="text" name="w_upazila" class="form-control" value="<?php echo $row['w_upazila']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Post Office</label>
                            <input type="text" name="w_post_office" class="form-control" value="<?php echo $row['w_post_office']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Village</label>
                            <input type="text" name="w_village" class="form-control" value="<?php echo $row['w_village']; ?>">
                        </div>

                        <div class="form-group">
                            <label>W Word No</label>
                            <input type="text" name="w_word_no" class="form-control" value="<?php echo $row['w_word_no']; ?>">
                        </div>
                    <?php
                    }
                    ?>



                    <!-- Submit Button -->
                    <!-- Submit Buttons -->
                    <button type="submit" name="approve" class="btn btn-success">Approved</button>
                    <button type="submit" name="reject" class="btn btn-danger">Rejected</button>


                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>
<!-- JavaScript to Handle Full-Screen Image Display -->
