<?php
include 'inc/connect.php';
include  'inc/header.php';

// GET THE TASK ID FROM URL AND STORE AS VARIABLE
$taskID = $_GET['id'];

// SQL STATEMENT TO SELECT TASK FROM DATABASE WHERE ID = TASKID
$sql = "SELECT * FROM tasks WHERE id=$taskID";

// EXECUTE THE QUERY
$result = $conn->query($sql);

// CHECK THE RESULT AND STORE VALUES FROM THE DATABASE AS VARIABLES
if ( $result->num_rows > 0 ) {

    while ( $row = $result->fetch_assoc() ) {
        $title = $row['title'];
        $text = $row['text'];
        $id = $row['id'];
    }

} else {
    $message = '<p class="error">There is no task that matches the ID!</p>';
}

?>

<div id="message"><?php echo $message; ?></div>


<h2 class="page-heading">Edit: <?php echo $title; ?></h2>

<form method="POST" action="update.php">
    
    <p>
        Title:<br>
        <input name="title" type="text" value="<?php echo $title; ?>">
    </p>
    
    <p>
        Text:<br>
        <textarea name="text"><?php echo $text; ?></textarea>
    </p>
    
    <p>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Update">
    </p>
    
</form>


<?php
include  'inc/footer.php';
?>