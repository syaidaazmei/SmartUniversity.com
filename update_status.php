<?php
@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('db.php'); // Include your database connection file

    // Get the submitted ID and status
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // Update the status in the database
    $query = "UPDATE user_book SET status = '$status' WHERE id = $id";
    if (mysqli_query($con, $query)) {
        // Redirect back to the admin page with a success message
        header('Location: admin_page.php?message=Status updated successfully');
        exit();
    } else {
        // Handle query failure
        die("Error updating record: " . mysqli_error($con));
    }
} else {
    // Redirect if accessed without POST
    header('Location: admin_page.php');
    exit();
}
?>
