<?php
// Database connection

include '../includes/db.php';

// Query to insert missing data from `users` table into `blood` table
$query = "
    INSERT INTO blood (user_id, name, blood_group, phone)
    SELECT users.user_id, users.name, users.blood, users.phone
    FROM users
    LEFT JOIN blood ON users.user_id = blood.user_id
    WHERE blood.user_id IS NULL
";

// Execute the query
if (mysqli_query($connect, $query)) {
        echo json_encode(["message" => "success"], JSON_UNESCAPED_UNICODE);
} else {
        echo json_encode(["message" => "No data found"], JSON_UNESCAPED_UNICODE);
}

// Close the connection
mysqli_close($connect);
?>
