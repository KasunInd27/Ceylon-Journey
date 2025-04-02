<?php
include('db.php');
$id = $_GET['id'];

$sql = "DELETE FROM destinations WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header('Location: ../Destination crud/destination_home.php');
} else {
    echo "Error: " . $conn->error;
}
?>
