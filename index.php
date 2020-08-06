<?php
include 'inc/connect.php';
include  'inc/header.php';

$status = $_GET['status'];

$message = '';

switch($status) {
    case 'added':
        $message = 'Task successfully added!';
        break;
    case 'deleted':
        $message = 'Task deleted!';
        break;
    case 'updated':
        $message = 'Task was successfully updated!';
        break;
    case 'completed':
        $message = 'A Task has been completed!';
        break;
    default:
        $message = '';
    
}

if ( !empty($message) ) :
    echo '<div class="notification">'. $message .'</div>';
endif;


?>


<h2 class="page-heading">All Tasks</h2>

<?php


// SQL STATEMENT TO SELECT ALL TASKS THAT ARE ACTIVE 
$sql = "SELECT * FROM tasks WHERE status='active'";

// EXECUTE THE QUERY
$result = $conn->query($sql);

// OUTPUT RESULTS HERE MUST LIST ALL TASKS THAT ARE ACTIVE
if ($result->num_rows > 0 ) {
    while($row = $result->fetch_assoc() ) {
        $id = $row['id'];
        $title = $row['title'];
        $text = $row['text'];
        $status = $row['status'];

        echo '<div class="row list-item">';
        echo '<div class="col-xs-2">'. $id .'</div>';
        echo '<div class="col-xs-4">'. $title .'</div>';
        echo '<div class="col-xs-3">'. $text .'</div>';     
        echo '<div class="col-xs-3 list-item-tools">';
        
        echo '<a href="view.php?id='. $id .'"><i class="fa fa-eye"></i></a>';
        echo '<a href="edit.php?id='. $id .'"><i class="fa fa-pencil"></i></a>';
        echo '<a href="delete.php?id='. $id .'"><i class="fa fa-trash"></i></a>';
        echo '<a href="completed.php?id='. $id .'"><i class="fa fa-check"></i></a>';

        echo '</div>';     
        echo '</div>';
    }
    
} else {
    echo 'No tasks found.';
}

?>


<?php
include  'inc/footer.php';
?>