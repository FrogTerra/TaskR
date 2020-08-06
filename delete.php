<?php
include 'inc/connect.php';

$taskId = $_GET['id'];

$sql = "DELETE 
        FROM tasks 
        WHERE id=$taskId";
        
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header('Location: index.php?status=deleted');
} else {
    $conn->close();
    echo 'The task you are trying to delete does not exist.';
}


