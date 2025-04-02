<?php
    
    include("conconfig.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $message = $_POST['message'];

       
        $sql = "UPDATE contact SET name='$name', email='$email', number='$number', message='$message' WHERE id='$id'";

       
        if (mysqli_query($con, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }

        
        mysqli_close($con);

       
        header("Location: readcontact.php");
    }
?>
