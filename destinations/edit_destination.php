<?php
include('db.php');
$id = $_GET['id'];

// destination details
$sql = "SELECT * FROM destinations WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']); 

    // upload handling
    $image = $_FILES['image']['name'];
    $target = "../destinations/uploads/" . basename($image);
    $imageFileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));

    // allow file types
    $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $maxFileSize = 2 * 1024 * 1024; // 2MB max limit

    if (!empty($image)) {
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

        // upload and update with new image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sql = "UPDATE destinations SET name='$name', description='$description', category='$category', image='$image' WHERE id=$id";
        } else {
            echo "Failed to upload image.";
            exit();
        }
    } else {
        // update without change image
        $sql = "UPDATE destinations SET name='$name', description='$description', category='$category' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: ../destinations/destination_home.php');
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
    <title>Edit Destination</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 10px;
            animation: changeBackground 9s infinite; /* 9 seconds to rotate between 3 images */
        }

        /* Define the background images and their transitions using keyframes */
        @keyframes changeBackground {
            0% {
                background-image: url('uploads/bg1.jpg');
            }
            33% {
                background-image: url('uploads/bg1.jpg');
            }
            34% {
                background-image: url('uploads/bg2.jpg');
            }
            66% {
                background-image: url('uploads/bg2.jpg');
            }
            67% {
                background-image: url('uploads/bg3.jpg');
            }
            100% {
                background-image: url('uploads/bg3.jpg');
            }
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95); /* Slightly transparent white */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            backdrop-filter: blur(10px); /* Glass effect */
            position: relative;
            z-index: 1; /* Ensure the form container is above the rotating background */
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #666;
            font-weight: bold;
            font-size: 1rem;
        }

        input[type="text"],
        textarea,
        input[type="file"],
        select {
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus,
        input[type="file"]:focus,
        select:focus {
            border-color: #28a745;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            padding: auto;
        }

        button {
            padding: 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .current-image {
            margin-bottom: 20px;
        }

        .current-image img {
            width: 150px;
            border-radius: 5px;
            display: block;
            margin-bottom: 10px;
        }

        .current-file {
            font-size: 14px;
            color: #555;
            margin-top: -15px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Destination</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Destination Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $row['description']; ?></textarea>

        <label for="category">Category:</label>
        <select name="category" required>
            <option value="Beach Side" <?php if ($row['category'] == 'Beach Side') echo 'selected'; ?>>Beach Side</option>
            <option value="Mountain" <?php if ($row['category'] == 'Mountain') echo 'selected'; ?>>Mountain</option>
            <option value="Jungle" <?php if ($row['category'] == 'Jungle') echo 'selected'; ?>>Jungle</option>
        </select>

        <label for="image">Image (optional):</label>
        <input type="file" name="image">

        <!-- show cur image if it exists -->
        <?php if (!empty($row['image'])): ?>
            <div class="current-image">
                <p>Current Image:</p>
                <img src="../destinations/uploads/<?php echo $row['image']; ?>" alt="Current Destination Image">
            </div>
        <?php endif; ?>
        
        <div class="button-group">
            <button type="submit">Update Destination</button>
        </div>
    </form>
</div>

</body>
</html>
