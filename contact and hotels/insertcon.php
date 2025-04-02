<?php


require 'conconfig.php';


$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$subject = $_POST['subject'];
$message = $_POST['message'];



$sql = "INSERT INTO contact (name, email, number, subject, message) 
        VALUES ('$name', '$email', '$number', '$subject', '$message')";


if ($con->query($sql)) {
    echo "Message sent successfully";
} else {
    
    echo "Error: " . $con->error;
}


$con->close();

?>
