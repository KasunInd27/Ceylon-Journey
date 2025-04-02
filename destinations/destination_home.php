<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 10px;
            animation: changeBackground 9s infinite; /* 9 seconds to cycle through 3 images (3s per image) */
        }

        /* Define the background images and their transition using keyframes */
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
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            width: 100%;
            position: relative;
            z-index: 2; /* Ensures the container is above the background */
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        a:hover {
            background-color: #7C878E;
            color: white;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05); /* Slight zoom effect when hovering over the card */
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 1rem;
            color: #777;
            margin-bottom: 20px;
        }

        .card-actions {
            display: flex;
            justify-content: space-around;
        }

        .card-actions a {
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            color: white;
        }

        .edit-btn {
            background-color: #ffc107;
        }

        .edit-btn:hover {
            background-color: #e0a800;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

    </style>
</head>
<body>

<div class="container">
    <h1>Destinations</h1>
    <div class="card-container">
        <?php
        $sql = "SELECT * FROM destinations";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "
                <div class='card'>
                    <img src='uploads/" . $row['image'] . "' alt='" . $row['name'] . "'>
                    <div class='card-content'>
                        <h3 class='card-title'>" . $row['name'] . "</h3>
                        <p class='card-description'>" . $row['description'] . "</p>
                        <div class='card-actions'>
                            <a class='edit-btn' href='edit_destination.php?id=" . $row['id'] . "'>Edit</a>
                            <a class='delete-btn' href='delete_destination.php?id=" . $row['id'] . "'>Delete</a>
                        </div>
                    </div>
                </div>
                ";
            }
        } else {
            echo "<p>No destinations found</p>";
        }
        ?>
    </div>
    <a href="index.php">Dashboard</a>
</div>

</body>
</html>
