<?php
include 'inc/connect.php';

// GET THE TASK ID FORM THE URL
$taskID = $_GET['id'];

// SQL STATEMENT TO UPDATE THE STATUS OF THE TASK TO COMPLETED
$sql = "UPDATE tasks SET status='completed' WHERE id=$taskID";

// EXECUTE THE QUERY
$result = $conn->query($sql);

// CHECK TO SEE IF THE UPDATE WAS SUCCESSFUL. IF TRUE REDIRECT TO INDEX.PHP, OTHERWISE CLOSE CONNECTION AND DISPLAY AN ERROR
if($conn->query($sql) === TRUE) {
    header('Location: index.php?status=completed');
    $conn->close;
} else {
    $message = '<p class="error">Task could not be updated!</p>';
    $conn->close;
}

