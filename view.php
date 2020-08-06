<?php
include 'inc/connect.php';
include  'inc/header.php';

$taskId = $_GET['id'];

$sql = "SELECT * 
        FROM tasks 
        WHERE id=$taskId";
        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        // Store the data in each column as a variable
        $id =  $row['id'];
        $title = $row['title'];
        $text = $row['text'];
    }
} else {
    echo "0 results";
}

?>

<h2 class="page-heading"><?php echo $title; ?></h2>

<p><?php echo $text; ?></p>

<div class="view-tools">
    <a href="edit.php?id=<?php echo $id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <a href="delete.php?id=<?php echo $id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <a href="completed.php?id=<?php echo $id; ?>"><i class="fa fa-check" aria-hidden="true"></i></a>
</div>




<?php
include  'inc/footer.php';
?>