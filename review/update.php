<?php

$conn = new mysqli('localhost', 'root', '', 'ceylon_journey');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['useremail'];
$reviewType = $_POST['reviewtype'];
$rating = $_POST['rating'];
$descrip = $_POST['descrip'];
$date = $_POST['date'];


$sql = "UPDATE reviews SET reviewType='$reviewType', rating=$rating, descrip='$descrip', date='$date' WHERE email='$email'";


if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Review updated successfully');
    window.location.href = 'read.php';
    </script>";
} else {
    echo "Error updating review: " . $conn->error;
}


$conn->close();
?>