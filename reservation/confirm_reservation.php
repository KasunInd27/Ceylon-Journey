<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = new mysqli("localhost", "root", "", "ceylon_journey");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

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

    $query = "INSERT INTO reservations (first_name, last_name, email, phone, country, city, hotel, room_type, checkin, checkout, guests) 
              VALUES ('$first_name', '$last_name', '$email', '$phone', '$country', '$city', '$hotel', '$room_type', '$checkin', '$checkout', '$guests')";

    if ($con->query($query) === TRUE) {
        echo "<script>
                alert('Reservation successfully created.');
                window.location.href = '../Login Page/profile.php'; 
              </script>";
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }

    $con->close();
}
?>
