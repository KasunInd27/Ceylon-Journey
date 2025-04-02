<?php

$conn = new mysqli('localhost', 'root', '', 'ceylon_journey');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['useremail'];
$reviewType = $_POST['reviewtype'];
$rating = $_POST['rating'];
$descrip = $_POST['description'];
$date = $_POST['udate'];


$sql = "INSERT INTO reviews (email, reviewType, rating, descrip, date) VALUES ('$email', '$reviewType', $rating, '$descrip', '$date')";


if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Review submitted successfully');
    window.location.href = 'read.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>