<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "../Destination crud/uploads/" . basename($image);

  
    $sql = "INSERT INTO destinations (name, description, image) VALUES ('$name', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
      
        header('Location: ../Destination crud/destination_home.php');
        exit(); 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Destination</title>
    <link rel="stylesheet" href="../Destination crud/css/styles.css"> <!-- Linking to the external CSS -->
</head>
<body>

<div class="container">
    <h1>Add New Destination</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Destination Name:</label>
        <input type="text" name="name" placeholder="Enter destination name" required>

        <label for="description">Description:</label>
        <textarea name="description" placeholder="Enter destination description" required></textarea>

        <label for="image">Image:</label>
        <input type="file" name="image" required>

        <div class="button-group">
            <button type="submit">Add Destination</button>
            <button type="button" class="home-button" onclick="window.location.href='../Destination crud/index.php';">Home</button>
        </div>
    </form>
</div>

</body>
</html>
