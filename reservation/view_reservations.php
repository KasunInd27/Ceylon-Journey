<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
    <header>
<div id="menu-bar" class="fas fa-bars"></div>

<a href="#" class="logo"><span>C</span>eylon Journey</a>

<nav class="navbar">
    <a href="../Home/home.php">Home</a>
    <a href="../contact and hotels/hotels.php">Hotels</a>
    <a href="../Rides/ride.php">Rides</a>
    <a href="../destinations/destinations.php">Destination</a>
    <a href="../review/service.php">Services</a>
    <a href="../review/review1.php">Review</a>
    <a href="../contact and hotels/contact.php">Contact</a>
</nav>
</header>
    
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../HF/hstyles.css">

    <title>View Reservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <br><br><br> <br><br><br> <br><br><br>

<?php
$con = new mysqli("localhost", "root", "", "ceylon_journey");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$result = $con->query("SELECT * FROM reservations");

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>City</th>
                <th>Hotel</th>
                <th>Room Type</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Guests</th>
                <th>Actions</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . $row['country'] . "</td>
                <td>" . $row['city'] . "</td>
                <td>" . $row['hotel'] . "</td>
                <td>" . $row['room_type'] . "</td>
                <td>" . $row['checkin'] . "</td>
                <td>" . $row['checkout'] . "</td>
                <td>" . $row['guests'] . "</td>
                <td>
                    <a href='update_reservation.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a> | 
                    <a href='delete_reservation.php?id=" . $row['id'] . "' class='delete-btn' onclick='return confirmDelete()'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No reservations found.";
}

$con->close();
?>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this reservation?');
    }
</script>

</body>
</html>
