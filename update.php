<?php
include 'inc/connect.php';

// STORE SUBMITTED FORM VALUES AS VARIABLES
$title = strip_tags( $_POST['title'] ); 
$text = strip_tags( $_POST['text'] ); 
$taskID = strip_tags( $_POST['id'] ); 

if (empty($title) || empty($text) ) {
    die('You cannot have empty fields!');
} else {
    // SQL UPDATE STATEMENT
    $sql = "UPDATE tasks SET
            title='$title',
            text='$text'
            WHERE id=$taskID";

    // CHECK THE CONNECTION AND UPDATE
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: index.php?status=updated");
    } else {
        $conn->close();
        echo "Error updating record: ";
        echo $conn->error;
    }

}

