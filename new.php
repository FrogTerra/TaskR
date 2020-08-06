<?php

include 'inc/connect.php';

$message = '';

// Check if form has been submited and process
if( isset($_POST['submit']) ) {
    
    // STORE SUBMITTED FORM DATA AS VARIABLES
    $title = strip_tags($_POST['title']);
    $text = strip_tags($_POST['text']);    
   
    // CHECK IF THE VARIABLES ARE EMPTY. IF NOT PROCEED
    if( empty($title) || empty($text) ) {
        die('There are empty fields!');
    } else {
        // INSERT THE VALUES INTO THE DATABASE. IF SUCCESSFUL DISPLAY A MESSAGE
        $sql = "INSERT INTO tasks (title, text) VALUES ('$title', '$text')";

        if($conn->query($sql) === TRUE) {
            header('Location: index.php?status=added');
        } else {
            $message = '<p class="error">Task could not be added!</p>';
        }
   
    }
   
}

include  'inc/header.php';
?>

<h2 class="page-heading">New Task</h2>

<div id="message"><?php echo $message; ?></div>

<div class="row">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="stacked-form">
        <div class="col-xs-12">
            <input type="text" name="title" placeholder="Title">
        </div>
        <div class="col-xs-12">
            <textarea name="text" placeholder="Task Description"></textarea>
        </div>
        <div class="col-xs-12">
           <input type="submit" name="submit" value="Add"> 
        </div>
    </form>      
</div>


<?php
include  'inc/footer.php';
?>