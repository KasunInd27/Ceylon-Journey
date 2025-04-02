<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']); // Sanitize category input

    // upload handleling
    $image = $_FILES['image']['name'];
    $target = "../destination/uploads/" . basename($image);
    $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

    // allow file types
    $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $maxFileSize = 2 * 1024 * 1024; // 2mb limit

    // check if file is image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
        exit();
    }

    // check size
    if ($_FILES['image']['size'] > $maxFileSize) {
        echo "Sorry, your file is too large. Maximum size is 2MB.";
        exit();
    }

    // check type
    if (!in_array($imageFileType, $allowedFileTypes)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, and WEBP files are allowed.";
        exit();
    }

    // upload file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // insert to database
        $sql = "INSERT INTO destinations (name, description, image, category) VALUES ('$name', '$description', '$image', '$category')";
        
        if ($conn->query($sql) === TRUE) {
            // redirect to destination_home.php if success
            header('Location: ../destination/destination_home.php');
            exit(); 
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Destination</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- CSS style sheet-->
</head>
<body>

<div class="container">
    <h1>Add New Destination</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Destination Name:</label>
        <input type="text" name="name" placeholder="Enter destination name" required>

        <label for="description">Description:</label>
        <textarea name="description" placeholder="Enter destination description" required></textarea>

        <label for="category">Category:</label>
        <select name="category" required>
            <option value="Beach Side">Beach Side</option>
            <option value="Mountain">Mountain</option>
            <option value="Jungle">Jungle</option>
        </select>

        <label for="image">Image:</label>
        <input type="file" name="image" required>

        <div class="button-group">
            <button type="submit">Add Destination</button>
            <button type="button" class="home-button" onclick="window.location.href='index.php';">Home</button>
        </div>
    </form>
</div>

</body>
</html>
