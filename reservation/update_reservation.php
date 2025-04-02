<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button.btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button.btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
$con = new mysqli("localhost", "root", "", "ceylon_journey");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch the reservation to be edited
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $con->query("SELECT * FROM reservations WHERE id = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form id="update-form" action="" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" value="<?php echo $row['phone']; ?>" required>

            <label for="country">Country:</label>
            <input type="text" name="country" value="<?php echo $row['country']; ?>" required>

            <label for="city">City:</label>
            <input type="text" name="city" value="<?php echo $row['city']; ?>" required>

            <label for="hotel">Hotel:</label>
            <select name="hotel" required>
                <option value="hotel1" <?php if ($row['hotel'] == 'hotel1') echo 'selected'; ?>>Avenra Garden</option>
                <option value="hotel2" <?php if ($row['hotel'] == 'hotel2') echo 'selected'; ?>>The Hilton</option>
                <option value="hotel3" <?php if ($row['hotel'] == 'hotel3') echo 'selected'; ?>> The White House</option>
            </select>

            <label for="room_type">Room Type:</label>
            <select name="room_type" required>
                <option value="single" <?php if ($row['room_type'] == 'single') echo 'selected'; ?>>Single</option>
                <option value="double" <?php if ($row['room_type'] == 'double') echo 'selected'; ?>>Double</option>
                <option value="suite" <?php if ($row['room_type'] == 'suite') echo 'selected'; ?>>Suite</option>
            </select>

            <label for="checkin">Check-In Date:</label>
            <input type="date" name="checkin" value="<?php echo $row['checkin']; ?>" required>

            <label for="checkout">Check-Out Date:</label>
            <input type="date" name="checkout" value="<?php echo $row['checkout']; ?>" required>

            <label for="guests">Number of Guests:</label>
            <input type="number" name="guests" value="<?php echo $row['guests']; ?>" min="1" required>

            <button type="submit" name="update" class="btn">Update Reservation</button>
        </form>
        <?php
    }
}

// Process the update
if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $hotel = $_POST['hotel'];
    $room_type = $_POST['room_type'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $guests = $_POST['guests'];

    $query = "UPDATE reservations 
              SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', 
                  country = '$country', city = '$city', hotel = '$hotel', room_type = '$room_type', 
                  checkin = '$checkin', checkout = '$checkout', guests = '$guests' 
              WHERE id = $id";
    
    if ($con->query($query)) {
        echo "Reservation updated successfully.";
        header("Location: view_reservations.php");
        exit; // Ensure that the script stops executing after the redirect
    } else {
        echo "Error updating reservation: " . $con->error;
    }
}

$con->close();
?>

<!-- Include JavaScript file -->
<script src="rescript.js"></script>
</body>
</html>
